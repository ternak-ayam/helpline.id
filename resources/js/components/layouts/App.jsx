import React from "react";
import { createTheme, ThemeProvider } from "@mui/material/styles";
import { Toaster } from "react-hot-toast";
import SimpleFooter from "../footer/SimpleFooter";
import { useSelector } from "react-redux";
import { useHistory } from "react-router-dom";

const App = ({ children, bottomFooter }) => {
    const history = useHistory();
    const { isLoggedIn } = useSelector((state) => state.auth);

    if (!isLoggedIn) history.push("/login");

    const theme = createTheme({
        radio: {
            "&$checked": {
                color: "#1565c0",
            },
        },
        palette: {
            primary: {
                main: "#1565c0",
            },
            secondary: {
                main: "#00c853",
            },
        },
    });

    return (
        <div>
            <div
                className="px-4"
                style={{
                    height: "100%",
                    width: "100%",
                    backgroundColor: "rgba(255,255,255,0.9)",
                    color: "white",
                }}
            >
                <Toaster position="top-center" reverseOrder={false} />
                <ThemeProvider theme={theme}>{children}</ThemeProvider>
                <SimpleFooter bottomFooter={bottomFooter} />
            </div>
        </div>
    );
};

export default App;
