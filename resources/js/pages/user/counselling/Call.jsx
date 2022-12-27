import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";
import AgoraRTC from "agora-rtc-sdk-ng";
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { getDetailCounsellorForCallPage } from "../../../actions/user";

const Call = () => {
    const { counsellingId } = useParams();
    const dispatch = useDispatch();
    const [connected, setConnected] = useState(false);
    const [isMicMuted, setMicMuted] = useState(false);
    const [isAudioMuted, setAudioMuted] = useState(false);
    const [channelParameters, setChannelParameters] = useState({
        localAudioTrack: null,
        remoteAudioTrack: null,
        remoteUid: null,
    });

    const { counsellor } = useSelector((state) => state.user);
    const { status } = useSelector((state) => state.message);

    let options = {
        appId: "41a005d083e7461c95e25698edc77346",
        channel: counsellingId,
        token: "007eJxTYBB7M3H1dv6eSWwbPc+FsXzX+CWYdPrpL/duF11Xq7NbQncqMJgYJhoYmKYYWBinmpuYGSZbmqYamZpZWqSmJJubG5uYLedendwQyMjQHH6LgREKQXwRBmcnT11nXSMDIyNDIyMzQwMjQ1NTBgYAOOoheA==",
        uid: counsellor.userId,
    };

    let agoraEngine = null;

    async function joinChannel() {
        agoraEngine = AgoraRTC.createClient({
            mode: "rtc",
            codec: "vp8",
        });

        agoraEngine.on("user-published", async (user, mediaType) => {
            await agoraEngine.subscribe(user, mediaType);
            console.log("subscribe success");
            // Subscribe and play the remote audio track.
            if (mediaType == "audio") {
                channelParameters.remoteUid = user.uid;
                channelParameters.remoteAudioTrack = user.audioTrack;
                channelParameters.remoteAudioTrack.play();
            }

            // Listen for the "user-unpublished" event.
            agoraEngine.on("user-unpublished", (user) => {
                console.log(user.uid + "has left the channel");
            });
        });

        await agoraEngine.join(
            options.appId,
            options.channel,
            options.token,
            options.uid
        );

        showMessage("Joined channel: " + options.channel);

        channelParameters.localAudioTrack =
            await AgoraRTC.createMicrophoneAudioTrack();
        await agoraEngine.publish([channelParameters.localAudioTrack]);

        setConnected(true);
    }

    const muteMic = () => {
        channelParameters.localAudioTrack.setEnabled(isMicMuted);
        setMicMuted(!isMicMuted);
    };

    const muteAudio = () => {
        channelParameters.remoteAudioTrack.setVolume(!isAudioMuted ? 0 : 100);
        setAudioMuted(!isAudioMuted);
    };

    // Listen to the Leave button click event.
    async function leaveChannel() {
        // Destroy the local audio track.
        channelParameters.localAudioTrack.close();

        window.location.reload();
    }

    function showMessage(text) {
        console.log(text);
    }

    useEffect(() => {
        dispatch(getDetailCounsellorForCallPage(counsellingId));
    }, []);

    return (
        <App>
            <Navbar />
            <div className="container flex m-auto justify-center p-2 mb-24 mt-20">
                <div className="border-blue-200 border border-2  rounded-xl w-full flex flex-col justify-center p-2 h-full">
                    <div className="mb-24">
                        <div className="flex-col flex justify-center p-2">
                            <img
                                className="lg:w-32 w-24 rounded-full m-auto"
                                src={counsellor.profilePicture}
                                alt=""
                            />
                            <p className="m-auto text-lg font-semibold text-[#2769c5]">
                                {counsellor.name}
                            </p>
                            <p className="m-auto text-sm font-medium text-[#2769c5]">
                                Counsellor
                            </p>
                        </div>
                        <div className="">
                            <hr className="w-[10rem] border-1 border-[#28c484] border-dashed rounded-xl rotate-90 mt-24 m-auto" />
                        </div>
                    </div>
                    <div className="flex justify-center mb-2">
                        <div>
                            <button
                                onClick={() => {
                                    muteMic();
                                }}
                                className={`py-2 px-3 ${
                                    isMicMuted ? "bg-red-500" : "bg-gray-400"
                                } rounded-full mx-1`}
                            >
                                <i className="fa-solid fa-microphone fa-xl text-white"></i>
                            </button>
                            {!connected ? (
                                <button
                                    disabled={status}
                                    onClick={() => {
                                        joinChannel();
                                    }}
                                    className={`p-4 bg-[#28c484] rounded-full mx-1`}
                                >
                                    <i className="fa-sharp fa-solid fa-phone fa-xl text-white"></i>
                                </button>
                            ) : (
                                <button
                                    onClick={() => {
                                        leaveChannel();
                                    }}
                                    className={`p-4 bg-red-500 rounded-full mx-1`}
                                >
                                    <i className="fa-sharp fa-solid fa-phone fa-xl text-white"></i>
                                </button>
                            )}
                            <button
                                onClick={() => {
                                    muteAudio();
                                }}
                                className={`py-2 px-3 ${
                                    isAudioMuted ? "bg-red-500" : "bg-gray-400"
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
