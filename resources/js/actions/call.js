import AgoraRTC from "agora-rtc-sdk-ng";
import User from "../services/user/service";
import {
    CALL_AUDIO_MUTED,
    CALL_CONNECTED,
    CALL_DISCONNECTED,
    CALL_MIC_MUTED,
    USER_JOIN,
    USER_LEFT,
} from "./type";

let channelParameters = {
    localAudioTrack: null,
    remoteAudioTrack: null,
    remoteUid: null,
};

let isMicMuted = false;
let isAudioMuted = false;

let options = {
    appId: "41a005d083e7461c95e25698edc77346",
    channel: "",
    token: "",
    uid: "",
};

let agoraEngine = null;

export const joinChannel = (channel, userId) => (dispatch) => {
    User.getCounsellingToken(channel, userId).then((response) => {
        options.token = response.token;
        dispatch(handleJoinChannel(channel, userId));
    });
};

export const handleJoinChannel = (channel, userId) => async (dispatch) => {
    agoraEngine = AgoraRTC.createClient({
        mode: "rtc",
        codec: "vp8",
    });

    options.channel = channel;
    options.uid = userId;

    agoraEngine.on("user-published", async (user, mediaType) => {
        await agoraEngine.subscribe(user, mediaType);

        dispatch({
            type: USER_JOIN,
            payload: {
                user: user,
                status: true,
            },
        });

        if (mediaType == "audio") {
            channelParameters.remoteUid = user.uid;
            channelParameters.remoteAudioTrack = user.audioTrack;
            channelParameters.remoteAudioTrack.play();
        }

        agoraEngine.on("user-unpublished", (user) => {
            dispatch({
                type: USER_LEFT,
                payload: {
                    user: user,
                    status: true,
                },
            });
        });
    });

    await agoraEngine.join(
        options.appId,
        options.channel,
        options.token,
        options.uid
    );

    channelParameters.localAudioTrack =
        await AgoraRTC.createMicrophoneAudioTrack();
    await agoraEngine.publish([channelParameters.localAudioTrack]);

    dispatch({
        type: CALL_CONNECTED,
        payload: true,
    });
};

export const toggleMic = () => (dispatch) => {
    channelParameters.localAudioTrack.setEnabled(isMicMuted);
    isMicMuted = !isMicMuted;

    dispatch({
        type: CALL_MIC_MUTED,
        payload: isMicMuted,
    });
};

export const toggleAudio = () => (dispatch) => {
    if (channelParameters.remoteAudioTrack) {
        channelParameters.remoteAudioTrack.setVolume(!isAudioMuted ? 0 : 100);
    }

    isAudioMuted = !isAudioMuted;

    dispatch({
        type: CALL_AUDIO_MUTED,
        payload: isAudioMuted,
    });
};

export const leaveChannel = () => (dispatch) => {
    channelParameters.localAudioTrack.close();

    dispatch({
        type: CALL_DISCONNECTED,
        payload: true,
    });

    window.location.reload();
};
