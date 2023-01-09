import Blog from "../services/blog/service";
import { DETAIL_POST, POSTS, SET_MESSAGE } from "./type";
import { showErrorAlert } from "./alert";

export const getPostDetail = (postId) => (dispatch) => {
    return Blog.getPostDetail(postId).then(
        (response) => {
            dispatch({
                type: DETAIL_POST,
                payload: {
                    post: response.data,
                },
            });

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            showErrorAlert(message);

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            return Promise.reject();
        }
    );
};

export const getPostList = () => (dispatch) => {
    return Blog.getPostList().then(
        (response) => {
            dispatch({
                type: POSTS,
                payload: {
                    posts: response.data,
                },
            });

            return Promise.resolve();
        },
        (error) => {
            const message = error.response.data.error;

            showErrorAlert(message);

            dispatch({
                type: SET_MESSAGE,
                payload: message,
            });

            return Promise.reject();
        }
    );
};
