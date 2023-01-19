import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";
import { useEffect, useRef, useState } from "react";
import { useParams } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import {
    initiateCallChannel,
    joinChannel,
    leaveChannel,
    toggleAudio,
    toggleCamera,
    toggleMic,
} from "../../../actions/call";
import { useStopwatch } from "react-timer-hook";
import useQuery from "../../../services/query/useQuery";

const Call = () => {
    const { counsellingId } = useParams();
    const dispatch = useDispatch();
    const query = useQuery();

    const { seconds, minutes, hours, start } = useStopwatch({
        autoStart: false,
    });

    const { counsellor } = useSelector((state) => state.user);
    const { status } = useSelector((state) => state.message);
    const { user, micMuted, audioMuted, cameraOn, connected } = useSelector(
        (state) => state.call
    );

    useEffect(() => {
        dispatch(initiateCallChannel(counsellingId, query.get("token")));
    }, []);

    return (
        <App needAuth={false}>
            <Navbar showUser={false} />
            <div className="container flex m-auto justify-center p-2 mb-24 mt-20">
                <div className="border-blue-200 border border-2  rounded-xl w-full flex flex-col justify-center p-2 h-full">
                    <div className="flex gap-2 justify-center">
                        <div
                            id={"videoContainer"}
                            className={
                                "videoContainer w-72 h-48 flex justify-center"
                            }
                        ></div>
                        <div
                            id={"remoteVideoContainer"}
                            className={"flex justify-center gap-2"}
                        >
                            <div
                                id="remotePlayerContainer"
                                className={"videoContainer w-72 h-48"}
                            ></div>
                        </div>
                    </div>

                    {!connected && (
                        <div className="mb-24">
                            <div className="flex-col flex justify-center p-2">
                                <img
                                    className="lg:w-32 w-24 rounded-full m-auto"
                                    src={
                                        user.user_type === "user"
                                            ? user.counsellor_image
                                            : process.env
                                                  .MIX_DEFAULT_PROFILE_PICTURE
                                    }
                                    alt=""
                                />
                                <p className="m-auto text-lg font-semibold text-[#2769c5]">
                                    {user.user_type === "user"
                                        ? counsellor.name
                                        : "User"}
                                </p>
                                <p className="m-auto text-sm font-medium text-[#2769c5]">
                                    {user.user_type === "user"
                                        ? "Counsellor"
                                        : "User"}
                                </p>
                            </div>
                            <div>
                                <hr className="w-[10rem] border-1 border-[#28c484] border-dashed rounded-xl rotate-90 mt-24 m-auto" />
                            </div>
                        </div>
                    )}

                    {status ? (
                        <div className={"text-center mt-2 mb-4"}>
                            <span className={"text-black"}>
                                Joining channel...
                            </span>
                        </div>
                    ) : null}
                    {connected ? (
                        <div className={"text-center mt-2 mb-4"}>
                            <span className={"text-black"}>
                                {hours}:{minutes}:{seconds}
                            </span>
                        </div>
                    ) : null}

                    <div className="flex justify-center mb-2">
                        {!connected ? (
                            <button
                                disabled={status}
                                onClick={() => {
                                    dispatch(
                                        joinChannel(
                                            counsellingId,
                                            user.user_id,
                                            user.user_type
                                        )
                                    ).then(() => {
                                        start();
                                    });
                                }}
                                className={`p-4 bg-[#28c484] rounded-full mx-1`}
                            >
                                <i className="fa-sharp fa-solid fa-phone fa-xl text-white"></i>
                            </button>
                        ) : (
                            <button
                                onClick={() => {
                                    dispatch(leaveChannel());
                                }}
                                className={`p-4 bg-red-500 rounded-full mx-1`}
                            >
                                <i className="fa-sharp fa-solid fa-phone fa-xl text-white"></i>
                            </button>
                        )}
                    </div>

                    <div className="flex justify-center mb-2">
                        <div>
                            <button
                                disabled={!connected}
                                onClick={() => {
                                    dispatch(toggleMic(micMuted));
                                }}
                                className={`py-2 px-3 ${
                                    micMuted ? "bg-red-500" : "bg-gray-400"
                                } rounded-full mx-1`}
                            >
                                <i className="fa-solid fa-microphone fa-xl text-white"></i>
                            </button>
                            <button
                                onClick={() => {
                                    dispatch(toggleCamera(cameraOn));
                                }}
                                disabled={!connected}
                                className={`p-3 ${
                                    cameraOn ? "bg-red-500" : "bg-gray-400"
                                } rounded-full mx-1`}
                            >
                                <i className="fa-solid fa-camera fa-xl text-white"></i>
                            </button>
                            <button
                                disabled={!connected}
                                onClick={() => {
                                    dispatch(toggleAudio(audioMuted));
                                }}
                                className={`py-2 px-3 ${
                                    audioMuted ? "bg-red-500" : "bg-gray-400"
                                } rounded-full mx-1`}
                            >
                                <i className="fa-solid fa-volume-high fa-sm text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </App>
    );
};
export default Call;
