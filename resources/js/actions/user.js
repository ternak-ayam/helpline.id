import User from "../services/user/service";
import {
    GET_ALL_COUNSELLOR,
    GET_COUNSELLOR,
    IS_LOADING,
    SET_BOOK_DATE,
    SET_MESSAGE,
    SET_SCHEDULE,
} from "./type";
import moment from "moment";
import { showErrorAlerts, showSuccessAlert } from "./alert";

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

export const storeBooking =
    (bookingData, counsellorId, bookDate) => (dispatch) => {
        dispatch({
            type: IS_LOADING,
            payload: true,
        });

        return User.storeBooking(bookingData, counsellorId, bookDate).then(
            () => {
                showSuccessAlert("Booking successfully");

                setTimeout(() => {
                    // console.log("Waiting...");
                }, 1000);

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
