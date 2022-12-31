import Navbar from "../../../components/layouts/Navbar";
import { useParams } from "react-router-dom";
import { useEffect, useRef, useState } from "react";
import useQuery from "../../../services/query/useQuery";
import { useDispatch, useSelector } from "react-redux";
import { getParsedAccessToken } from "../../../actions/text";

const TextChat = () => {
    const { counsellingId } = useParams();
    const query = useQuery();
    const dispatch = useDispatch();
    const [messages, setMessages] = useState([]);
    const [inputMessage, setInputMessage] = useState({
        userId: "",
        profilePicture: "..",
        text: "",
    });

    const messageRef = useRef();
    let fileRef = useRef(null);

    const { status } = useSelector((state) => state.message);
    const { user, channel, message } = useSelector((state) => state.text);

    useEffect(() => {
        dispatch(getParsedAccessToken(query.get("token"), counsellingId));
    }, []);

    useEffect(() => {
        message ? setMessages([...messages, JSON.parse(message.text)]) : null;
    }, [message]);

    useEffect(() => {
        messageRef.current.scrollTop = messageRef.current.scrollHeight;
    }, [messages]);

    const handleSendMessage = (e) => {
        e.preventDefault();

        if (!inputMessage.text) return;

        sendMessage();

        setInputMessage({
            ...inputMessage,
            text: "",
        });
    };

    const sendMessage = () => {
        let message = {
            user: {
                image:
                    user.user_type === "counsellor"
                        ? user.counsellor_image
                        : user.user_type === "translator"
                        ? user.translatpr_image
                        : "https://media.istockphoto.com/id/1087531642/vector/male-face-silhouette-or-icon-man-avatar-profile-unknown-or-anonymous-person-vector.jpg?s=170667a&w=0&k=20&c=2BM-cif-x0i68L_JU3mchnl9NFhUIGEAWg003bUyn5k=",
            },
            text: inputMessage.text,
            userId: user.user_id,
            attachment: null,
            type: "text",
        };

        channel.sendMessage({ text: JSON.stringify(message) });

        setMessages([...messages, message]);
    };

    const sendFileMessage = (e) => {
        const file = e.target.files[0];
        const fileUrl = URL.createObjectURL(file);

        let message = {
            user: {
                image:
                    user.user_type === "counsellor"
                        ? user.counsellor_image
                        : user.user_type === "translator"
                        ? user.translatpr_image
                        : "https://media.istockphoto.com/id/1087531642/vector/male-face-silhouette-or-icon-man-avatar-profile-unknown-or-anonymous-person-vector.jpg?s=170667a&w=0&k=20&c=2BM-cif-x0i68L_JU3mchnl9NFhUIGEAWg003bUyn5k=",
            },
            text: file.name,
            userId: user.user_id,
            file: file,
            attachment: fileUrl,
            type: "attachment",
        };

        channel.sendMessage({ text: JSON.stringify(message) });

        setMessages([...messages, message]);
    };

    return (
        <div>
            <Navbar />
            <div className="container flex m-auto justify-center lg:h-[80vh] h-[45rem] p-2 lg:mb-0 mb-32">
                <div className="border-blue-200 border border-2 rounded-xl w-full h-full flex flex-col  p-4 gap-4">
                    <div
                        className="flex w-full flex-col overflow-y-auto gap-4 h-full p-2"
                        ref={messageRef}
                    >
                        {messages.map((message, key) => (
                            <div key={key}>
                                {message.userId !== user.user_id && (
                                    <div className="flex">
                                        <div className="flex gap-4">
                                            <div>
                                                <img
                                                    className="w-16 w-16 rounded-full m-auto"
                                                    src={message.user.image}
                                                    alt=""
                                                />
                                            </div>

                                            <div>
                                                {message.type === "text" ? (
                                                    <div className="lg:max-w-lg w-full border py-2 px-4 border-2 border-blue-200 rounded-br-2xl text-black rounded-tr-2xl rounded-tl-2xl lg:text-lg text-sm">
                                                        {message.text}
                                                    </div>
                                                ) : (
                                                    <div
                                                        onClick={() => {
                                                            window.open(
                                                                message.attachment,
                                                                "_blank"
                                                            );
                                                        }}
                                                        className="cursor-pointer lg:max-w-lg w-full border py-2 px-4 border-2 border-blue-200 rounded-br-2xl text-black rounded-tr-2xl rounded-tl-2xl lg:text-lg text-sm"
                                                    >
                                                        <i className="fa-solid fa-file-arrow-down"></i>{" "}
                                                        {message.text}
                                                    </div>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                )}
                                {message.userId === user.user_id && (
                                    <div className="flex justify-end">
                                        <div className="flex gap-4">
                                            <div>
                                                {message.type === "text" ? (
                                                    <div className="lg:max-w-lg w-full border py-2 px-4 border-2 border-blue-200 rounded-br-2xl text-black rounded-tr-2xl rounded-tl-2xl lg:text-lg text-sm">
                                                        {message.text}
                                                    </div>
                                                ) : (
                                                    <div
                                                        onClick={() => {
                                                            window.open(
                                                                message.attachment,
                                                                "_blank"
                                                            );
                                                        }}
                                                        className="cursor-pointer lg:max-w-lg w-full border py-2 px-4 border-2 border-blue-200 rounded-br-2xl text-black rounded-tr-2xl rounded-tl-2xl lg:text-lg text-sm"
                                                    >
                                                        <i className="fa-solid fa-file-arrow-down"></i>{" "}
                                                        {message.text}
                                                    </div>
                                                )}
                                            </div>
                                            <div>
                                                <img
                                                    className="w-16 w-16 rounded-full m-auto"
                                                    src={message.user.image}
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </div>
                        ))}
                    </div>
                    <div className="flex flex-row items-center h-16 rounded-xl bg-white w-full lg:px-4">
                        <form
                            className="w-full flex items-center"
                            onSubmit={handleSendMessage}
                            method="post"
                        >
                            <div className="flex-grow ml-4">
                                <div className="relative w-full">
                                    <input
                                        onChange={(e) => {
                                            setInputMessage({
                                                ...inputMessage,
                                                text: e.target.value,
                                            });
                                        }}
                                        value={inputMessage.text}
                                        type="text"
                                        className="flex w-full border text-black rounded-xl focus:outline-none focus:border-blue-400 pl-4 h-10  border border-2 border-blue-200"
                                    />
                                    <input
                                        type="file"
                                        onChange={(e) => {
                                            sendFileMessage(e);
                                        }}
                                        ref={(refParam) => (fileRef = refParam)}
                                        className={"hidden"}
                                    />
                                    <button
                                        type={"button"}
                                        onClick={() => fileRef.click()}
                                        className="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-blue-600"
                                    >
                                        <i className="fa-solid fa-paperclip"></i>
                                    </button>
                                </div>
                            </div>
                            <div className="ml-4">
                                <button
                                    type={"submit"}
                                    className="flex items-center justify-center bg-blue-600 hover:bg-indigo-600 rounded-xl text-white px-4 py-2 flex-shrink-0"
                                >
                                    <span className="mr-2">
                                        <i className="fa-solid fa-paper-plane"></i>
                                    </span>
                                    <span>Send</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default TextChat;
