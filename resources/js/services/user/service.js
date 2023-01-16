import axios from "axios";
import authHeader from "../auth/header";

const API_URL = process.env.MIX_API_URL;

const getCounsellor = (page) => {
    return axios
        .get(API_URL + "/counsellors?page=" + page, { headers: authHeader() })
        .then((response) => {
            return response.data;
        });
};

const getDetailCounsellor = (counsellorId) => {
    return axios
        .get(API_URL + "/counsellors/" + counsellorId, {
            headers: authHeader(),
        })
        .then((response) => {
            return response.data;
        });
};

const getCounsellorForCallPage = (counsellingId) => {
    return axios
        .get(API_URL + "/counselling/" + counsellingId, {
            headers: authHeader(),
        })
        .then((response) => {
            return response.data;
        });
};

const getCounsellorForTextPage = (counsellingId) => {
    return axios
        .get(API_URL + "/counselling/" + counsellingId, {
            headers: authHeader(),
        })
        .then((response) => {
            return response.data;
        });
};

const storeBooking = (bookingData, counsellorId, bookDate) => {
    return axios
        .post(
            API_URL + "/counselling",
            {
                counsellor_id: counsellorId,
                counselling_method: bookingData.counsellingMethod,
                translator_language: bookingData.translatorLanguage,
                schedule: bookDate,
            },
            { headers: authHeader() }
        )
        .then((response) => {
            return response.data;
        });
};

const getUserBoard = () => {
    return axios
        .get(API_URL + "/profile", { headers: authHeader() })
        .then((response) => {
            return response.data;
        });
};

const UpdateUserProfile = (user) => {
    return axios
        .put(
            API_URL + "/profile",
            {
                name: user.name,
                email: user.email,
                country: user.country,
                birthdate: user.birthdate,
                sex: user.sex,
                password: user.password,
            },
            { headers: authHeader() }
        )
        .then((response) => {
            return response.data;
        });
};

const getCounsellingToken = (counsellingId, userId, tokenType = "rtcToken") => {
    return axios
        .get(
            `${
                process.env.MIX_TOKEN_GENERATOR_URL + tokenType
            }?channelName=${counsellingId}&uid=${userId}`,
            {
                "Access-Control-Allow-Origin": "*",
            }
        )
        .then((response) => {
            return response.data;
        });
};

const updateDuration = (duration, userId, channelId, userType) => {
    return axios
        .put(
            API_URL + "/" + userType + "/call/" + channelId,
            {
                userId: userId,
                duration: duration,
            },
            { headers: authHeader() }
        )
        .then((response) => {
            return response.data;
        });
};

const storeDuration = (userId, channelId, userType) => {
    return axios
        .post(
            API_URL + "/" + userType + "/call/" + channelId,
            {
                userId: userId,
            },
            { headers: authHeader() }
        )
        .then((response) => {
            return response.data;
        });
};

const storeMessages = (channelId, message, attachment = null) => {
    const formData = new FormData();

    formData.append("userId", message.userId);
    formData.append("text", message.text);
    if (attachment) {
        formData.append("attachment", attachment);
    }
    formData.append("type", message.type);
    formData.append("userType", message.userType);

    return axios
        .post(API_URL + "/chat/" + channelId, formData, {
            headers: authHeader(),
        })
        .then((response) => {
            return response.data;
        });
};

const getMessages = (channelId) => {
    return axios
        .get(API_URL + "/chat/" + channelId, {
            headers: authHeader(),
        })
        .then((response) => {
            return response.data;
        });
};

const parseChatAccessToken = (token) => {
    return axios
        .get(API_URL + "/parse/accesstoken/" + token, { headers: authHeader() })
        .then((response) => {
            return response.data;
        });
};

export default {
    getUserBoard,
    getCounsellor,
    getDetailCounsellor,
    parseChatAccessToken,
    storeBooking,
    getCounsellorForCallPage,
    getCounsellorForTextPage,
    getCounsellingToken,
    updateDuration,
    storeDuration,
    getMessages,
    UpdateUserProfile,
    storeMessages,
};
