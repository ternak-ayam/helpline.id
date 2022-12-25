import { GET_ALL_COUNSELLOR, GET_COUNSELLOR } from "../actions/type";

const initialState = {
    counsellors: [],
    counsellor: {
        educations: [],
        languages: [],
        schedules: [],
        calendars: [],
    },
};

export default (state = initialState, action) => {
    const { type, payload } = action;

    switch (type) {
        case GET_ALL_COUNSELLOR:
            return {
                ...state,
                counsellors: payload.data,
            };
        case GET_COUNSELLOR:
            return {
                ...state,
                counsellor: payload.data,
            };
        default:
            return state;
    }
};
