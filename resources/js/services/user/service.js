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
    return axios.get(API_URL + "/", { headers: authHeader() });
};

const getCounsellingToken = (counsellingId, userId) => {
    return axios
        .get(
            `${process.env.MIX_TOKEN_GENERATOR_URL}rtcToken?channelName=${counsellingId}&uid=${userId}`,
            {
                "Access-Control-Allow-Origin": "*",
            }
        )
        .then((response) => {
            return response.data;
        });
};

const updateDuration = (duration, userId, channel, userType) => {
    return axios
        .put(
            API_URL + "/" + userType + "/call/" + channel,
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

const storeDuration = (userId, channel, userType) => {
    return axios
        .post(
            API_URL + "/" + userType + "/call/" + channel,
            {
                userId: userId,
            },
            { headers: authHeader() }
        )
        .then((response) => {
            return response.data;
        });
};

export default {
    getUserBoard,
    getCounsellor,
    getDetailCounsellor,
    storeBooking,
    getCounsellorForCallPage,
    getCounsellingToken,
    updateDuration,
    storeDuration,
};
