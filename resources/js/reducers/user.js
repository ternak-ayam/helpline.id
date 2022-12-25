import { GET_COUNSELLOR } from "../actions/type";

export default (state = { data: [] }, action) => {
    const { type, payload } = action;
    switch (type) {
        case GET_COUNSELLOR:
            return {
                ...state,
                data: payload.data,
            };
        default:
            return state;
    }
};
