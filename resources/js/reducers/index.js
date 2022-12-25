import { combineReducers } from "redux";
import auth from "./auth";
import user from "./user";
import message from "./message";
import booking from "./booking";

export default combineReducers({
    auth,
    user,
    booking,
    message,
});
