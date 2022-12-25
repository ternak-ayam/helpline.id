import User from "../services/user/service";
import {
    GET_ALL_COUNSELLOR,
    GET_COUNSELLOR,
    SET_BOOK_DATE,
    SET_MESSAGE,
    SET_SCHEDULE,
} from "./type";
import moment from "moment";

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

export const setBookDate = (date, time) => (dispatch) => {
    let datetime = date + "T" + time + ":00";
    datetime = new moment(datetime, "YYYY-MM-DDTHH:mm").utc();

    dispatch({
        type: SET_BOOK_DATE,
        payload: datetime.format("YYYY-MM-DD HH:mm"),
    });
};
