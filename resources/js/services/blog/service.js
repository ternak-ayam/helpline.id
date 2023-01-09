const API_URL = process.env.MIX_API_URL;

const getPostList = () => {
    return axios.get(API_URL + "/posts").then((response) => {
        return response.data;
    });
};

const getPostDetail = (postId) => {
    return axios.get(API_URL + "/posts/" + postId).then((response) => {
        return response.data;
    });
};

export default { getPostList, getPostDetail };
