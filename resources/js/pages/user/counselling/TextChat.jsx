import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";
import { useParams } from "react-router-dom";
import AgoraRTM from "agora-rtm-sdk";
import { useEffect, useState } from "react";
import useQuery from "../../../services/query/useQuery";

const TextChat = () => {
    const { counsellingId } = useParams();
    const query = useQuery();
    const [channel, setChannel] = useState(null);

    const client = AgoraRTM.createInstance("41a005d083e7461c95e25698edc77346");

    useEffect(async () => {
        await client.login({
            uid: "4",
            token: "00641a005d083e7461c95e25698edc77346IAAFkUaR10cshCBqGlwDXZdyHG6IAHZpa7lL+MKtIEq/7zgbtvMAAAAAEABhuYw20jWvYwEA6AO3Na9j",
        });
        const channel = client.createChannel(counsellingId);
        await channel.join().then(() => {
            console.log("Join channel: " + channel.channelId);
        });

        setChannel(channel);

        channel.on("ChannelMessage", (message, userId) => {
            console.log(message);
        });
    }, []);

    const sendMessage = () => {
        channel.sendMessage({
            text: "Hello",
            type: "text",
        });
    };

    return (
        <App>
            <Navbar />
            <div className={"container"}></div>
            <button
                onClick={() => {
                    sendMessage();
                }}
            >
                Send
            </button>
        </App>
    );
};
export default TextChat;
