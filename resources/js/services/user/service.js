import axios from "axios";
import authHeader from "../auth/header";

const API_URL = process.env.MIX_API_URL;

const getCounsellor = () => {
    return axios
        .get(API_URL + "/counsellors", { headers: authHeader() })
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
};
