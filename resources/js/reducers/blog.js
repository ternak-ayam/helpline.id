import { DETAIL_POST, POSTS } from "../actions/type";

const initialState = {
    posts: [],
    post: {
        tags: [],
    },
};

export default (state = initialState, action) => {
    const { type, payload } = action;

    switch (type) {
        case POSTS:
            return {
                ...state,
                posts: payload.posts,
            };
        case DETAIL_POST:
            return {
                ...state,
                post: payload.post,
            };
        default:
            return state;
    }
};
