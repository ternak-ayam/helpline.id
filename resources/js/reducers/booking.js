import { SET_BOOK_DATE, SET_BOOKING } from "../actions/type";

export default (state = { bookDate: null }, action) => {
    const { type, payload } = action;

    switch (type) {
        case SET_BOOK_DATE:
            return {
                ...state,
                bookDate: payload,
            };
        default:
            return state;
    }
};
