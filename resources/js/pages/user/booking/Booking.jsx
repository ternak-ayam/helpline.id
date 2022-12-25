import Navbar from "../../../components/layouts/Navbar";
import App from "../../../components/layouts/App";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { getDetailCounsellor, setBookDate } from "../../../actions/user";
import { useParams } from "react-router-dom";
import moment from "moment";

const Booking = () => {
    const dispatch = useDispatch();
    const { counsellorId } = useParams();

    const { counsellor } = useSelector((state) => state.user);
    const { bookDate } = useSelector((state) => state.booking);

    useEffect(() => {
        dispatch(getDetailCounsellor(counsellorId));
    }, []);

    const getFormattedBookDate = (date, time) => {
        let datetime = date + "T" + time + ":00";
        datetime = new moment(datetime, "YYYY-MM-DD HH:mm").utc();

        return datetime.format("YYYY-MM-DD HH:mm");
    };

    return (
        <App>
            <Navbar />
            <div className="container m-auto flex flex-wrap gap-4 justify-center lg:justify-start p-2 lg:p-0 mb-4">
                <div className="w-[12rem] bg-[#f0f4fc] rounded-2xl p-4 h-[12rem]">
                    <div className="flex justify-end w-full">
                        <div className="w-4 h-4 rounded-full bg-[#28c484]"></div>
                    </div>
                    <div className="flex flex-col justify-center w-full gap-1">
                        <div className="m-auto">
                            <img
                                className="w-[6rem] h-[6rem] rounded-full"
                                src={counsellor.profilePicture}
                                alt=""
                            />
                        </div>
                        <p className="m-auto text-sm font-semibold text-[#2769c5]">
                            {counsellor.name}
                        </p>
                        <p className="m-auto text-xs font-medium text-[#2769c5]">
                            Counsellor
                        </p>
                    </div>
                </div>
                <div className="lg:w-[30rem] w-full">
                    <div className="flex gap-4 items-center">
                        <i className="fa-solid fa-arrow-right fa-2xl text-blue-300"></i>
                        <div className="text-[#2769c5] text-2xl font-bold">
                            My Profile
                        </div>
                    </div>
                    <div className="w-full border border-2 rounded-xl border-blue-300 mt-8 p-4">
                        <div className="flex gap-4">
                            <i className="fa-solid fa-user text-blue-300 mt-1"></i>
                            <div className=" text-blue-600 text-lg font-normal">
                                {counsellor.bio}
                            </div>
                        </div>
                        <div className="flex gap-3 mt-6">
                            <i className="fa-solid fa-graduation-cap text-blue-300 mt-1"></i>
                            <div className=" text-blue-600 text-lg font-normal">
                                <ul>
                                    {counsellor.educations.map((item, i) => (
                                        <li key={i}>
                                            {item.major} - {item.institution}
                                        </li>
                                    ))}
                                </ul>
                            </div>
                        </div>
                        <div className="flex gap-3 mt-6">
                            <i className="fa-solid fa-language text-blue-300 mt-1"></i>
                            <div className=" text-blue-600 text-lg font-normal">
                                <ul>
                                    {counsellor.languages.map((item, i) => (
                                        <li key={i}>{item.language}</li>
                                    ))}
                                </ul>
                            </div>
                        </div>
                        <div className="flex p-8 gap-1 flex-wrap">
                            <div className="form-check flex items-center gap-2">
                                <input
                                    name={"language"}
                                    className="rounded-full  h-4 w-4 border border-2 border-blue-300"
                                    type="radio"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label
                                    className="form-check-label inline-block text-[#2769c5] font-medium text-xs py-2 px-4 bg-[#fff4dc] rounded-lg"
                                    htmlFor="flexCheckDefault"
                                >
                                    Farsi
                                </label>
                            </div>
                            <div className="form-check flex items-center gap-2">
                                <input
                                    name={"language"}
                                    className="rounded-full h-4 w-4 border border-2 border-blue-300"
                                    type="radio"
                                    value=""
                                    id="arabic"
                                />
                                <label
                                    className="form-check-label inline-block text-[#2769c5] font-medium text-xs py-2 px-4 bg-[#fff4dc] rounded-lg"
                                    htmlFor="arabic"
                                >
                                    Arabic
                                </label>
                            </div>
                            <div className="form-check flex items-center gap-2">
                                <input
                                    name={"language"}
                                    className="rounded-full h-4 w-4 border border-2 border-blue-300"
                                    type="radio"
                                    value=""
                                    id="tamil"
                                />
                                <label
                                    className="form-check-label inline-block text-[#2769c5] font-medium text-xs py-2 px-4 bg-[#fff4dc] rounded-lg"
                                    htmlFor="tamil"
                                >
                                    Tamil
                                </label>
                            </div>
                            <div className="form-check flex items-center gap-2">
                                <input
                                    name={"language"}
                                    className="rounded-full h-4 w-4 border border-2 border-blue-300"
                                    type="radio"
                                    value=""
                                    id="rohingya"
                                />
                                <label
                                    className="form-check-label inline-block text-[#2769c5] font-medium text-xs py-2 px-4 bg-[#fff4dc] rounded-lg"
                                    htmlFor="rohingya"
                                >
                                    Rohingya
                                </label>
                            </div>
                        </div>
                        <span className="bg-[#fff4dc] text-xs font-normal text-[#2769c5] p-2 w-full rounded-xl">
                            *You will be connected with Counsellor and
                            Translator
                        </span>
                    </div>
                </div>
                <div className="lg:w-[35rem] w-full">
                    <div className="flex gap-4 items-center">
                        <i className="fa-solid fa-arrow-right fa-2xl text-blue-300"></i>
                        <div className="text-[#2769c5] text-2xl font-bold">
                            Book Counselling
                        </div>
                    </div>
                    <div className="mt-8">
                        <div className="flex">
                            <div className="border border-2 border-blue-300 py-2 px-4 rounded">
                                <i className="fa-solid fa-gears fa-xl text-blue-300"></i>{" "}
                                <span className="text-[#2769c5] text-lg font-medium">
                                    Select method of Counselling
                                </span>
                            </div>
                        </div>
                        <div className="flex flex-wrap gap-2 mt-4">
                            <div className="form-check flex items-center gap-2">
                                <input
                                    name={"method"}
                                    className="rounded-full h-4 w-4 border border-2 border-blue-300"
                                    type="radio"
                                    value=""
                                    id="chatCounsellingMethod"
                                />
                                <label
                                    className="form-check-label inline-block text-[#2769c5] font-medium text-xs py-2 px-4 bg-[#fff4dc] rounded-lg"
                                    htmlFor="chatCounsellingMethod"
                                >
                                    <i className="fa-solid fa-envelope text-[#2769c5] text-base"></i>{" "}
                                    Live Chat
                                </label>
                            </div>
                            <div className="form-check flex items-center gap-2">
                                <input
                                    name={"method"}
                                    className="rounded-full h-4 w-4 border border-2 border-blue-300"
                                    type="radio"
                                    value=""
                                    id="callCounsellingMethod"
                                />
                                <label
                                    className=" flex gap-2 form-check-label inline-block text-[#2769c5] font-medium text-xs py-2 px-4 bg-[#fff4dc] rounded-lg"
                                    htmlFor="callCounsellingMethod"
                                >
                                    <img
                                        src={
                                            process.env.MIX_APP_URL +
                                            "/assets/volume.png"
                                        }
                                        alt=""
                                        className="w-4"
                                    />
                                    <span>Live Audio Chat</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div className="flex mt-4">
                        <div className="border border-2 border-blue-300 py-2 px-4 rounded">
                            <i className="fa-sharp fa-solid fa-calendar fa-xl text-blue-300"></i>{" "}
                            <span className="text-[#2769c5] text-lg font-medium">
                                Select time for Counselling
                            </span>
                        </div>
                    </div>
                    <div className="w-full border border-2  border-blue-300 rounded-xl p-2 mt-4 flex gap-2 overflow-x-scroll">
                        <div className="flex gap-2 justify-center m-auto">
                            {counsellor.calendars.map((date, i) => (
                                <div key={i}>
                                    <div className="text-blue-700 bg-blue-300 flex flex-col p-2 rounded-tl-xl">
                                        <div className="text-xs  font-medium">
                                            {moment(date.date).format("dddd")}
                                        </div>
                                        <div className="text-xs font-medium ">
                                            {moment(date.date).format("MMM DD")}
                                        </div>
                                    </div>
                                    {date.times.map((time, i) =>
                                        !counsellor.schedules.includes(
                                            getFormattedBookDate(
                                                date.date,
                                                time
                                            )
                                        ) ? (
                                            <div
                                                onClick={() => {
                                                    dispatch(
                                                        setBookDate(
                                                            date.date,
                                                            time
                                                        )
                                                    );
                                                }}
                                                key={i}
                                                className={`text-blue-700 ${
                                                    getFormattedBookDate(
                                                        date.date,
                                                        time
                                                    ) === bookDate
                                                        ? "bg-blue-200"
                                                        : "bg-blue-100 hover:bg-blue-200"
                                                } flex flex-col p-4 mt-2 cursor-pointer`}
                                            >
                                                <div className="text-xs text-center font-medium">
                                                    {time}
                                                </div>
                                            </div>
                                        ) : (
                                            <div key={i}>
                                                <div
                                                    className={`text-white bg-red-500 flex flex-col p-4 mt-2`}
                                                >
                                                    <div className="text-xs text-center font-medium">
                                                        Booked
                                                    </div>
                                                </div>
                                            </div>
                                        )
                                    )}
                                </div>
                            ))}
                        </div>
                    </div>
                    <div className="w-full flex mt-8 justify-end lg:mb-0 mb-32">
                        <button
                            type="submit"
                            className="p-2 bg-blue-700 rounded-lg px-4"
                        >
                            <i className="fa-solid fa-arrow-right fa-xl text-white"></i>{" "}
                            <span className="text-white text-lg">
                                Book Counselling
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </App>
    );
};
export default Booking;
