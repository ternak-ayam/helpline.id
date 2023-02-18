import { GET_PROFILE } from "../actions/type";

const initialState = {
    user: {
        name: null,
        email: null,
        unhcr_number: null,
        country: null,
        city: null,
        birthdate: null,
        sex: null,
        counselling_histories: [],
    },
};

export default (state = initialState, action) => {
    const { type, payload } = action;

    switch (type) {
        case GET_PROFILE:
            return {
                ...state,
                user: payload,
            };
        default:
            return state;
    }
};
