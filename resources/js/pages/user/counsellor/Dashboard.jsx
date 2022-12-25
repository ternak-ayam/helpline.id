import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";
import { useDispatch, useSelector } from "react-redux";
import { getCounsellor } from "../../../actions/user";
import { useEffect } from "react";
import { Link } from "react-router-dom";

const Dashboard = () => {
    const dispatch = useDispatch();
    const { counsellors } = useSelector((state) => state.user);

    useEffect(() => {
        dispatch(getCounsellor(1));
    }, []);

    return (
        <App>
            <Navbar />
            <div className="container m-auto p-2">
                <div className="flex w-[80%] p-4 m-auto flex-col">
                    <div className="flex w-full justify-center">
                        <div className="lg:text-3xl text-xl font-normal text-[#2769c5] text-center">
                            You can chat with us about anything that's on your
                            mind - no matter how overwhelming, we are here to
                            listen.
                        </div>
                    </div>
                    <div className="lg:w-2/3 w-full grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 pl-8 lg:pl-0 mt-4 m-auto">
                        {counsellors.map((item, i) => (
                            <div
                                key={i}
                                className="w-[12rem] bg-[#f0f4fc] rounded-2xl p-4"
                            >
                                <div className="flex justify-end w-full">
                                    <div className="w-4 h-4 rounded-full bg-[#28c484]"></div>
                                </div>
                                <div className="flex flex-col justify-center w-full gap-1">
                                    <div className="m-auto">
                                        <img
                                            className="w-[6rem] h-[6rem] rounded-full"
                                            src={item.profilePicture}
                                            alt="Counsellor Photo"
                                        />
                                    </div>
                                    <p className="m-auto text-sm font-semibold text-[#2769c5]">
                                        {item.name}
                                    </p>
                                    <p className="m-auto text-xs font-medium text-[#2769c5]">
                                        Counsellor
                                    </p>
                                    <Link
                                        to={`/counsellors/${item.id}/booking`}
                                    >
                                        <div className="dark:hover:bg-blue-700 text-white text-sm font-semibold p-2 text-white bg-[#2769c5] text-center rounded-xl">
                                            Chat
                                        </div>
                                    </Link>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </App>
    );
};

export default Dashboard;
