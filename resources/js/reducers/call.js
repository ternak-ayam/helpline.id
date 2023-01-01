import {
    CALL_AUDIO_MUTED,
    CALL_CONNECTED,
    CALL_DISCONNECTED,
    CALL_MIC_MUTED,
    USER_AUDIO_CHAT,
    USER_JOIN,
    USER_LEFT,
    USER_TEXT_CHAT,
    USERS_JOIN_AMOUNT,
} from "../actions/type";

const initialState = {
    connected: false,
    audioMuted: false,
    micMuted: false,
    user: {
        counselling_id: null,
        user_id: null,
        owner_type: null,
        counsellor_image: null,
        translator_image: null,
    },
    amount: 0,
};

export default (state = initialState, action) => {
    const { type, payload } = action;

    switch (type) {
        case CALL_CONNECTED:
            return {
                ...state,
                connected: payload,
            };
        case CALL_AUDIO_MUTED:
            return {
                ...state,
                audioMuted: payload,
            };
        case CALL_MIC_MUTED:
            return {
                ...state,
                micMuted: payload,
            };
        case USER_JOIN:
            return {
                ...state,
                user: payload,
            };
        case USER_LEFT:
            return {
                ...state,
                user: payload,
            };
        case USER_AUDIO_CHAT:
            return {
                ...state,
                user: payload.data,
            };
        case USERS_JOIN_AMOUNT:
            return {
                ...state,
                amount: payload,
            };
        default:
            return state;
    }
};
