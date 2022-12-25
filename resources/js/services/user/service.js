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

const getUserBoard = () => {
    return axios.get(API_URL + "/", { headers: authHeader() });
};

export default {
    getUserBoard,
    getCounsellor,
    getDetailCounsellor,
};
