import {
    MESSAGE,
    MESSAGES,
    TEXT_CHANNEL,
    USER_TEXT_CHAT,
} from "../actions/type";

const initialState = {
    user: {
        counselling_id: null,
        user_id: null,
        owner_type: null,
        counsellor_image: null,
        translator_image: null,
    },
    channel: null,
    message: null,
    messages: [],
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
        case MESSAGE:
            return {
                ...state,
                message: payload.message,
            };
        case MESSAGES:
            return {
                ...state,
                messages: payload.message,
            };

        default:
            return state;
    }
};
