import AgoraRTC from "agora-rtc-sdk-ng";
import User from "../services/user/service";
import {
    CALL_AUDIO_MUTED,
    CALL_CONNECTED,
    CALL_DISCONNECTED,
    CALL_MIC_MUTED,
    IS_LOADING,
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
    appId: process.env.MIX_AGORA_APP_ID,
    channel: "",
    token: "",
    uid: "",
    userType: "",
};

let agoraEngine = null;

export const joinChannel = (channel, userId, userType) => (dispatch) => {
    dispatch({
        type: IS_LOADING,
        payload: true,
    });
    User.getCounsellingToken(channel, userId).then((response) => {
        options.token = response.token;
        dispatch(handleJoinChannel(channel, userId, userType));
    });

    return Promise.resolve();
};

export const handleJoinChannel =
    (channel, userId, userType) => async (dispatch) => {
        agoraEngine = AgoraRTC.createClient({
            mode: "rtc",
            codec: "vp8",
        });

        options.channel = channel;
        options.uid = userId;
        options.userType = userType;

        agoraEngine.on("connection-state-change", (event) => {
            if (event === "DISCONNECTED") {
                let rtcStats = agoraEngine.getRTCStats();

                User.updateDuration(
                    rtcStats.Duration,
                    options.uid,
                    options.channel,
                    options.userType
                );

                setTimeout(() => {
                    window.location.href =
                        "/counselling/" + options.channel + "/done";
                }, 2000);
            }

            if (event === "CONNECTED") {
                User.storeDuration(
                    options.uid,
                    options.channel,
                    options.userType
                );
            }
        });

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

        dispatch({
            type: IS_LOADING,
            payload: false,
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

export const leaveChannel = () => async (dispatch) => {
    channelParameters.localAudioTrack.close();
    await agoraEngine.leave();

    dispatch({
        type: CALL_CONNECTED,
        payload: false,
    });
};
