import User from "../services/user/service";
import { GET_ALL_COUNSELLOR, GET_COUNSELLOR, SET_MESSAGE } from "./type";

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
