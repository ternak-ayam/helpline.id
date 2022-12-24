import { Route, Switch } from "react-router-dom";
import React from "react";
import Dashboard from "../pages/user/dashboard/Dashboard";
import Login from "../pages/user/auth/Login";
import Register from "../pages/user/auth/Register";
import SendResetPasswordLink from "../pages/user/auth/password/SendResetPasswordLink";
import ResetPassword from "../pages/user/auth/password/ResetPassword";
import CounsellorDashboard from "../pages/user/counsellor/Dashboard";
import Booking from "../pages/user/booking/Booking";
import AfterBooking from "../pages/user/booking/AfterBooking";
import AfterCounselling from "../pages/user/counselling/AfterCounselling";
import Chat from "../pages/user/counselling/Chat";
import Call from "../pages/user/counselling/Call";

const Web = () => {
    return (
        <React.Fragment>
            <Switch>
                <Route path={"/login"} component={Login} exact />
                <Route path={"/register"} component={Register} exact />
                <Route
                    path={"/password/reset"}
                    component={SendResetPasswordLink}
                    exact
                />
                <Route
                    path={"/password/reset/:token"}
                    component={ResetPassword}
                    exact
                />
                <Route path={"/"} component={Dashboard} exact />
                <Route
                    path={"/counsellors/:counsellorId/booking"}
                    component={Booking}
                    exact
                />
                <Route
                    path={"/booking/:bookingId/success"}
                    component={AfterBooking}
                    exact
                />
                <Route
                    path={"/counselling/:counsellingId/done"}
                    component={AfterCounselling}
                    exact
                />
                <Route
                    path={"/counselling/:counsellingId/chat"}
                    component={Chat}
                    exact
                />
                <Route
                    path={"/counselling/:counsellingId/call"}
                    component={Call}
                    exact
                />
                <Route
                    path={"/counsellors"}
                    component={CounsellorDashboard}
                    exact
                />
            </Switch>
        </React.Fragment>
    );
};
export default Web;
