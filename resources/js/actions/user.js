import User from "../services/user/service";
import {
    GET_ALL_COUNSELLOR,
    GET_COUNSELLOR,
    GET_PROFILE,
    IS_LOADING,
    SET_BOOK_DATE,
    SET_MESSAGE,
    SET_SCHEDULE,
    USER_AUDIO_CHAT,
    USER_TEXT_CHAT,
} from "./type";
import moment from "moment";
import {showErrorAlert, showErrorAlerts, showSuccessAlert} from "./alert";
import { generateRtmToken } from "./text";

export const updateUserProfile = (user) => (dispatch) => {
    dispatch({
        type: IS_LOADING,
        payload: true,
    });

    return User.UpdateUserProfile(user).then(
        () => {
            dispatch({
                type: IS_LOADING,
                payload: false,
            });

            showSuccessAlert("Success update user profile");

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            dispatch({
                type: IS_LOADING,
                payload: false,
            });

            showErrorAlerts(message.errors);

            return Promise.reject();
        }
    );
};

export const getUserProfile = () => (dispatch) => {
    dispatch({
        type: IS_LOADING,
        payload: true,
    });
    return User.getUserBoard().then(
        (response) => {
            dispatch({
                type: GET_PROFILE,
                payload: response.data,
            });

            dispatch({
                type: IS_LOADING,
                payload: false,
            });

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            dispatch({
                type: IS_LOADING,
                payload: false,
            });

            return Promise.reject();
        }
    );
};

export const getCounsellor = (page) => (dispatch) => {
    return User.getCounsellor(page).then(
        (response) => {
            dispatch({
                type: GET_ALL_COUNSELLOR,
                payload: { data: response.data },
            });

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            return Promise.reject();
        }
    );
};

export const getDetailCounsellor = (counsellorId) => (dispatch) => {
    return User.getDetailCounsellor(counsellorId).then(
        (response) => {
            dispatch({
                type: GET_COUNSELLOR,
                payload: { data: response.data },
            });

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            return Promise.reject();
        }
    );
};

export const getDetailCounsellorForCallPage = (counsellingId) => (dispatch) => {
    dispatch({
        type: IS_LOADING,
        payload: true,
    });
    return User.getCounsellorForCallPage(counsellingId).then(
        (response) => {
            dispatch({
                type: GET_COUNSELLOR,
                payload: { data: response.data },
            });

            dispatch({
                type: IS_LOADING,
                payload: false,
            });

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            dispatch({
                type: IS_LOADING,
                payload: false,
            });

            if(error.response.status === 401) {
                showErrorAlert({message: "You should login first"})
            }

            return Promise.reject();
        }
    );
};

export const getDetailCounsellorForTextPage =
    (counsellingId, userId) => (dispatch) => {
        dispatch({
            type: IS_LOADING,
            payload: true,
        });

        return User.getCounsellorForTextPage(counsellingId).then(
            (response) => {
                dispatch({
                    type: USER_TEXT_CHAT,
                    payload: { data: response.data },
                });

                dispatch({
                    type: IS_LOADING,
                    payload: false,
                });

                console.log(response.data);

                dispatch(
                    generateRtmToken(counsellingId, response.data.user.id)
                );

                return Promise.resolve();
            },
            (error) => {
                const message = error.response.data.error;

                dispatch({
                    type: SET_MESSAGE,
                    payload: message,
                });

                dispatch({
                    type: IS_LOADING,
                    payload: false,
                });

                return Promise.reject();
            }
        );
    };

export const storeBooking =
    (bookingData, counsellorId, bookDate) => (dispatch) => {
        dispatch({
            type: IS_LOADING,
            payload: true,
        });

        return User.storeBooking(bookingData, counsellorId, bookDate).then(
            () => {
                showSuccessAlert("Booking successfully");

                dispatch({
                    type: IS_LOADING,
                    payload: false,
                });

                return Promise.resolve();
            },
            (error) => {
                const message = error.response.data.error;

                showErrorAlerts(message.errors);

                dispatch({
                    type: IS_LOADING,
                    payload: false,
                });

                return Promise.reject();
            }
        );
    };

export const setBookDate = (date, time) => (dispatch) => {
    let datetime = date + "T" + time + ":00";
    datetime = new moment(datetime, "YYYY-MM-DDTHH:mm").utc();

    dispatch({
        type: SET_BOOK_DATE,
        payload: datetime.format("YYYY-MM-DD HH:mm"),
    });
};
