import axios from "axios";
import authHeader from "./header";

const API_URL = process.env.MIX_API_URL;

const login = (email, password) => {
    return axios
        .post(API_URL + "/login", {
            email: email,
            password: password,
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        })
        .then((response) => {
            const user = response.data.data.user;

            if (user.access_token) {
                localStorage.setItem("user", JSON.stringify(user));
            }

            return response.data;
        });
};

const register = (userData) => {
    return axios
        .post(API_URL + "/register", {
            name: userData.name,
            email: userData.email,
            unhcr_number: userData.unhcr,
            city: userData.city,
            country: userData.country,
            birthdate: userData.birthdate,
            sex: userData.sex,
            password: userData.password,
            informed_consent: userData.informedConsent,
            informed_address: userData.informedAddress,
            informed_limitation: userData.informedLimitation,
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        })
        .then((response) => {
            const user = response.data.data.user;

            if (user.access_token) {
                localStorage.setItem("user", JSON.stringify(user));
            }

            return response.data;
        });
};

const cities = () => {
    return axios.get(API_URL + "/cities").then((response) => {
        return response.data;
    });
};

const logout = () => {
    return axios
        .post(API_URL + "/logout", {}, { headers: authHeader() })
        .then((response) => {
            if (localStorage.getItem("user")) {
                localStorage.removeItem("user");
            }

            return response.data;
        });
};

const sendResetPasswordLink = (email) => {
    return axios
        .post(API_URL + "/password/email", {
            email: email,
        })
        .then((response) => {
            return response.data;
        });
};

const updatePassword = (data) => {
    return axios
        .post(API_URL + "/password/reset", {
            email: data.email,
            token: data.token,
            password: data.password,
            password_confirmation: data.passwordConfirmation,
        })
        .then((response) => {
            return response.data;
        });
};

export default {
    login,
    register,
    logout,
    sendResetPasswordLink,
    updatePassword,
    cities,
};
