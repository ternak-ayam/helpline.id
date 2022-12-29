import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";
import { useEffect } from "react";
import { useParams } from "react-router-dom";
import EaseApp from "agora-chat-uikit/lib/EaseApp";

const Chat = () => {
    const { counsellingId } = useParams();

    return (
        <App>
            <Navbar />
        </App>
    );
};
export default Chat;
