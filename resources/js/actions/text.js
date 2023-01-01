import {
    IS_LOADING,
    MESSAGE,
    MESSAGES,
    TEXT_CHANNEL,
    USER_TEXT_CHAT,
} from "./type";
import User from "../services/user/service";
import { showErrorAlert, showSuccessAlert } from "./alert";
import AgoraRTM from "agora-rtm-sdk";

let options = {
    token: "",
    userId: "",
};

let client = null;

export const getMessages = (channelId) => (dispatch) => {
    User.getMessages(channelId).then((response) => {
        dispatch({
            type: MESSAGES,
            payload: { message: response.data },
        });
    });
};

export const generateRtmToken = (channelId, userId) => (dispatch) => {
    User.getCounsellingToken(channelId, userId, "rtmToken").then((response) => {
        options.token = response.token;
        options.userId = userId;

        dispatch(joinTextChannel(channelId, userId));
    });

    return Promise.resolve();
};

export const initiateTextChannel = (token, channelId) => (dispatch) => {
    User.parseChatAccessToken(token).then(
        (response) => {
            dispatch({
                type: USER_TEXT_CHAT,
                payload: { data: response.data },
            });

            dispatch(generateRtmToken(channelId, response.data.user_id));

            return Promise.resolve();
        },
        (error) => {
            const errorData = error.response.data;

            showErrorAlert(errorData);

            setTimeout(() => {
                window.location.href = "/";
            }, 1000);

            return Promise.reject();
        }
    );
};

export const joinTextChannel = (channelId, userId) => async (dispatch) => {
    dispatch({
        type: IS_LOADING,
        payload: true,
    });

    client = AgoraRTM.createInstance(process.env.MIX_AGORA_APP_ID);

    await client.login({
        uid: userId.toString(),
        token: options.token,
    });

    const channel = client.createChannel(channelId);

    dispatch({
        type: TEXT_CHANNEL,
        payload: channel,
    });

    await channel.join().then(() => {
        showSuccessAlert("A user join to chat");
    });

    channel.on("ChannelMessage", (message, userId) => {
        dispatch({
            type: MESSAGE,
            payload: {
                message: message,
                userId: userId,
            },
        });
    });

    dispatch({
        type: IS_LOADING,
        payload: false,
    });

    return Promise.resolve();
};
