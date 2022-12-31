import { MESSAGES, TEXT_CHANNEL, USER_TEXT_CHAT } from "../actions/type";

const initialState = {
    user: {
        counselling_id: null,
        user_id: null,
        owner_type: null,
        counsellor_image: null,
        translator_image: null,
    },
    channel: null,
    messages: null,
};

export default (state = initialState, action) => {
    const { type, payload } = action;
    switch (type) {
        case USER_TEXT_CHAT:
            return {
                ...state,
                user: payload.data,
            };
        case TEXT_CHANNEL:
            return {
                ...state,
                channel: payload,
            };
        case MESSAGES:
            return {
                ...state,
                message: payload.message,
            };

        default:
            return state;
    }
};
