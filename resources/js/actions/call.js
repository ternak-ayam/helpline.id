import AgoraRTC from "agora-rtc-sdk-ng";
import User from "../services/user/service";
import {
    CALL_AUDIO_MUTED,
    CALL_CONNECTED,
    CALL_DISCONNECTED,
    CALL_MIC_MUTED,
    IS_LOADING,
    USER_AUDIO_CHAT,
    USER_JOIN,
    CALL_CAMERA_ON,
    USER_LEFT,
    USER_TEXT_CHAT,
} from "./type";
import { getDetailCounsellorForCallPage } from "./user";
import { showErrorAlert } from "./alert";

let channelParameters = {
    localAudioTrack: null,
    localVideoTrack: null,
    remoteAudioTrack: null,
    remoteVideoTrack: null,
    remoteUid: null,
};

let isMicMuted = false;
let isAudioMuted = false;
let isCameraOn = false;

let options = {
    appId: process.env.MIX_AGORA_APP_ID,
    channel: "",
    token: "",
    uid: "",
    userType: "",
};

let agoraEngine = null;

export const joinChannel =
    (channelId, userId, userType, counsellingMethod) => (dispatch) => {
        dispatch({
            type: IS_LOADING,
            payload: true,
        });

        dispatch(
            generateRtcToken(channelId, userId, userType, counsellingMethod)
        );

        return Promise.resolve();
    };

export const initiateCallChannel = (channelId, token) => (dispatch) => {
    User.parseChatAccessToken(token).then(
        (response) => {
            dispatch({
                type: USER_AUDIO_CHAT,
                payload: { data: response.data },
            });

            dispatch(
                getDetailCounsellorForCallPage(
                    channelId,
                    response.data.user_type
                )
            );

            return Promise.resolve();
        },
        (error) => {
            const errorData = error.response.data;

            showErrorAlert(errorData.error);

            // setTimeout(() => {
            //     window.location.href = "/";
            // }, 1000);

            return Promise.reject();
        }
    );
};

const generateRtcToken =
    (channelId, userId, userType, counsellingMethod) => (dispatch) => {
        User.getCounsellingToken(channelId, userType + userId).then(
            (response) => {
                options.token = response.token;

                dispatch(
                    handleJoinChannel(
                        channelId,
                        userId,
                        userType,
                        counsellingMethod
                    )
                );
            }
        );
    };

export const handleJoinChannel =
    (channel, userId, userType, counsellingMethod) => async (dispatch) => {
        const videoContainer = document.getElementById("videoContainer");
        const remoteVideoContainer = document.getElementById(
            "remoteVideoContainer"
        );
        const remotePlayerContainer = document.getElementById(
            "remotePlayerContainer"
        );

        agoraEngine = AgoraRTC.createClient({
            mode: "rtc",
            codec: "h264",
        });

        options.channel = channel;
        options.uid = userType + userId;
        options.userType = userType;

        agoraEngine.on("connection-state-change", (event) => {
            if (event === "DISCONNECTED") {
                let rtcStats = agoraEngine.getRTCStats();

                User.updateDuration(
                    rtcStats.Duration,
                    userId,
                    options.channel,
                    options.userType
                );

                setTimeout(() => {
                    window.location.href =
                        "/counselling/" + options.channel + "/done";
                }, 2000);
            }

            if (event === "CONNECTED") {
                User.storeDuration(userId, options.channel, options.userType);
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

            if (mediaType == "video" && counsellingMethod == "video-chat") {
                channelParameters.remoteVideoTrack = user.videoTrack;
                channelParameters.remoteAudioTrack = user.audioTrack;
                channelParameters.remoteUid = user.uid.toString();
                remotePlayerContainer.id = user.uid.toString();
                channelParameters.remoteUid = user.uid.toString();

                remoteVideoContainer.append(remotePlayerContainer);

                channelParameters.remoteVideoTrack.play(remoteVideoContainer);
            }

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

        if (counsellingMethod == "video-chat") {
            channelParameters.localVideoTrack =
                await AgoraRTC.createCameraVideoTrack();

            channelParameters.localVideoTrack.play(videoContainer);

            await agoraEngine.publish([
                channelParameters.localAudioTrack,
                channelParameters.localVideoTrack,
            ]);
        } else {
            await agoraEngine.publish([channelParameters.localAudioTrack]);
        }

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

export const toggleCamera = () => (dispatch) => {
    channelParameters.localVideoTrack.setEnabled(isCameraOn);
    isCameraOn = !isCameraOn;

    dispatch({
        type: CALL_CAMERA_ON,
        payload: isCameraOn,
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

export const leaveChannel = (counsellingMethod) => async (dispatch) => {
    if (counsellingMethod == "video-chat") {
        channelParameters.localVideoTrack.close();
    } else {
        channelParameters.localAudioTrack.close();
    }
    await agoraEngine.leave();

    dispatch({
        type: CALL_CONNECTED,
        payload: false,
    });
};
