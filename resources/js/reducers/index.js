import { combineReducers } from "redux";
import auth from "./auth";
import user from "./user";
import message from "./message";
import booking from "./booking";
import call from "./call";
import text from "./text";
import blog from "./blog";

export default combineReducers({
    auth,
    user,
    booking,
    message,
    call,
    text,
    blog,
});
