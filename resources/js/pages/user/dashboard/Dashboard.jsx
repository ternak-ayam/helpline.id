import AdvanceFooter from "../../../components/footer/AdvanceFooter";
import FloatQuestionButton from "../../../components/button/FloatQuestionButton";
import { Link } from "react-router-dom";

const Dashboard = () => {
    return (
        <div>
            <div
                className={"h-screen"}
                style={{
                    backgroundImage: `url(${
                        process.env.MIX_APP_URL + "/assets/helpline_bg.png"
                    })`,
                }}
            >
                <div className="bg-white w-full">
                    <nav className="container m-auto grid lg:grid-cols-6 grid-cols-1 py-2">
                        <div className="col-span-1 flex justify-center lg:justify-start">
                            <img
                                src={
                                    process.env.MIX_APP_URL +
                                    "/assets/logo_helpline.png"
                                }
                                alt="Logo"
                            />
                        </div>
                        <div className="lg:col-span-2 col-span-1 flex gap-2 items-center justify-center lg:mt-none ">
                            <a href="#" className={"-mt-12 mr-2"}>
                                <i className="fa-solid fa-arrow-right text-[#2769c5] fa-2xl"></i>
                            </a>
                            <div>
                                <div className="text-2xl font-bold tracking-[2px] text-[#2769c5]">
                                    CRISIS SUPPORT
                                </div>
                                <div className="text-2xl font-bold tracking-[2px] text-[#2769c5]">
                                    FOR REFUGEES
                                </div>
                                <div className="text-sm text-[#28c484] font-semibold">
                                    IN INDONESIA
                                </div>
                            </div>
                        </div>
                        <div className="col-span-1 flex flex-col gap-2 items-center lg:justify-start mt-2 lg:mt-none">
                            <div className="bg-[#28c484] p-1 rounded-sm w-1/2 flex gap-2 items-center justify-center">
                                <img
                                    className="w-[34px]"
                                    src={
                                        process.env.MIX_APP_URL +
                                        "/assets/livestreamicon.png"
                                    }
                                    alt=""
                                />{" "}
                                <a href="#" className="text-white text-lg">
                                    Online
                                </a>
                            </div>
                            <div className="bg-[#2769c5] p-1 rounded-sm w-2/3 flex gap-2 items-center justify-center">
                                <a href="#" className="text-white text-lg">
                                    Available 24/7
                                </a>
                            </div>
                        </div>
                        <div className="lg:col-span-2 flex gap-8 justify-center lg:justify-start my-auto lg:mt-none lg:mb-none">
                            <div className="flex gap-2 items-center justify-center">
                                <img
                                    className="w-[34px]"
                                    src={
                                        process.env.MIX_APP_URL +
                                        "/assets/message.png"
                                    }
                                    alt=""
                                />
                                <a
                                    href=""
                                    className="border-b-2 border-[#28c484] text-lg text-[#2769c5]"
                                >
                                    LIVE CHAT
                                </a>
                            </div>
                            <div className="flex gap-2 items-center justify-center">
                                <img
                                    className="w-[30px]"
                                    src={
                                        process.env.MIX_APP_URL +
                                        "/assets/volume.png"
                                    }
                                    alt=""
                                />
                                <a
                                    href=""
                                    className="border-b-2 border-[#28c484] text-lg text-[#2769c5]"
                                >
                                    LIVE AUDIO CHAT
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div className="flex w-full bg-[#2769c5] p-8 justify-center flex-col items-center min-h-[10rem] gap-2 lg:mt-[20rem] md:mt-[15rem] mt-[15rem] lg:mb-0 mb-[15rem] ">
                    <div className="lg:text-6xl lg:font-thin text-xl font-normal text-white text-center">
                        You are not alone. We're here to listen.
                    </div>
                    <Link
                        to={"/counsellors"}
                        className="py-2 px-4 mt-4 rounded-full border border-[#28c484] lg:text-3xl text-white hover:bg-[#28c484]"
                    >
                        Chat With Us
                    </Link>
                </div>
            </div>
            <div>
                <div className="container m-auto">
                    <div className="grid lg:grid-cols-2 grid-cols-1 mt-8">
                        <div className="col-span-1 p-2">
                            <div className="flex flex-col gap-4">
                                <div className="lg:text-5xl text-blue-600 font-semibold text-2xl">
                                    We're waiting for your call
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal">
                                    Whatever you're going through, we will face
                                    it with you.
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal mt-4">
                                    We're here 24 hours a day, 365 days a year.
                                </div>
                                <div>
                                    <Link
                                        to={"/counsellors"}
                                        className=" text-center px-4 py-2  mt-4 rounded-full  bg-[#28c484] lg:text-2xl lg:font-normal text-white w-1/3"
                                    >
                                        Chat With Us
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div className="col-span-1 lg:mt-0 mt-4 p-2">
                            <div className="flex flex-col gap-4 text-end justify-end">
                                <div className="lg:text-5xl text-blue-600 font-semibold text-2xl">
                                    منتظر تماس شما هستیم
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal">
                                    هر چه را که گذرانده اید، ما با شما روبرو
                                    خواهیم شد.
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal mt-4">
                                    ما 24 ساعت شبانه روز و 365 روز سال اینجا
                                    هستیم.
                                </div>
                                <div>
                                    <Link
                                        to={"/counsellors"}
                                        className="text-center px-4 py-2 bg-[#28c484]  mt-4 rounded-full   lg:text-2xl lg:font-normal text-white w-1/3"
                                    >
                                        دردش معنا
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="border-1 border-blue-500 mt-8">
                    <div className="bg-[#2769c5] lg:h-[5rem] lg:w-[90%] w-full rounded-r-full mt-4 p-2 flex items-center relative">
                        <div className="px-4 rounded-full flex items-center lg:ml-4">
                            <img
                                className="w-[50px]  p-2 rounded-full bg-[#28c484]"
                                src={
                                    process.env.MIX_APP_URL +
                                    "/assets/iconlove.png"
                                }
                                alt=""
                            />
                        </div>
                        <div className="lg:text-3xl text-white font-semibold text-xl">
                            A practical guide of stree management
                        </div>
                        <div className="lg:absolute right-8 md:absolute">
                            <img
                                className="lg:w-[30px] w-[20px] rotate-180"
                                src={
                                    process.env.MIX_APP_URL +
                                    "/assets/segitiga.png"
                                }
                                alt=""
                            />
                        </div>
                    </div>
                    <div className="lg:ml-8 lg:w-[80%] w-[90%] p-2 lg:p-8 border border-1 border-[#2769c5] rounded-2xl lg:mt-[-4rem] mt-[-1rem] ">
                        <div className="text-justify text-[#2769c5] lg:mt-16 mt-2 text-lg font-semibold p-2">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Sunt doloribus voluptatem autem, illo quos
                            velit ab maxime cumque consequuntur commodi quas
                            esse est sint, rerum architecto aut, debitis tempora
                            aliquam enim nisi non libero. Quam voluptatum
                            maiores corporis, maxime alias omnis itaque officia
                            non autem molestias temporibus fugiat porro? Fuga
                            voluptas natus tenetur animi delectus dicta aliquid,
                            atque maxime vero dolorem minima consequatur
                            reiciendis repellat minus quisquam quaerat, quo est
                            totam placeat laborum. Totam incidunt minus facere.
                            Eligendi id expedita corporis fuga possimus
                            quibusdam rerum ex molestiae minima. Magnam modi in
                            at sequi quos cum placeat vero aspernatur odit
                            illum.
                        </div>
                        <div className="mt-2 flex justify-end">
                            <a
                                href=""
                                className="bg-[#28c484] py-2 px-4 text-white text-lg rounded-full"
                            >
                                Read More ->
                            </a>
                        </div>
                    </div>
                    <FloatQuestionButton />
                    <div className="bg-[#2769c5] lg:h-[5rem] lg:w-[90%] w-full rounded-r-full mt-4 p-2 flex items-center relative">
                        <div className=" px-4  rounded-full flex items-center lg:ml-4">
                            <img
                                className="w-[50px]  p-2 rounded-full bg-[#28c484]"
                                src={
                                    process.env.MIX_APP_URL +
                                    "/assets/iconlove.png"
                                }
                                alt=""
                            />
                        </div>
                        <div className="lg:text-3xl text-white font-semibold text-xl">
                            Breathing exercise practice{" "}
                            <i className="fa-solid fa-camera p-2 bg-white lg:fa-xl rounded-full text-[#2769c5]"></i>
                        </div>
                        <div className="lg:absolute right-8 md:absolute">
                            <img
                                className="lg:w-[30px] w-[20px] rotate-180"
                                src={
                                    process.env.MIX_APP_URL +
                                    "/assets/segitiga.png"
                                }
                                alt=""
                            />
                        </div>
                    </div>
                    <div className="lg:ml-8 lg:w-[80%] w-[90%] p-2 lg:p-8 border border-1 border-[#2769c5] rounded-2xl lg:mt-[-4rem] mt-[-1rem] ">
                        <div className="text-justify text-[#2769c5] lg:mt-16 mt-2 text-lg font-semibold p-2">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Sunt doloribus voluptatem autem, illo quos
                            velit ab maxime cumque consequuntur commodi quas
                            esse est sint, rerum architecto aut, debitis tempora
                            aliquam enim nisi non libero. Quam voluptatum
                            maiores corporis,
                        </div>
                        <div className="p-2 lg:float-left float-none">
                            <img
                                className="w-[15rem]"
                                src="https://www.tripsavvy.com/thmb/qFqPcg6Wo24Hu4fLokNfAZdC-xQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/fuji-mountain-in-autumn-822273028-5a6a8a9c3418c600363958d3.jpg"
                                alt=""
                            />
                        </div>
                        <div>
                            <div className="text-justify text-[#2769c5] text-lg font-semibold p-2">
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Reiciendis iste quod nostrum
                                repudiandae laborum odit deleniti repellat
                                inventore asperiores minus ipsa temporibus iusto
                                rerum sint, consequuntur eius eligendi nisi
                                sapiente ducimus quidem cupiditate delectus
                                eaque voluptates saepe. Vitae aut qui, beatae,
                                totam omnis minima illo vel debitis dolor,
                                necessitatibus rem.
                            </div>
                            <div className="mt-2 flex justify-end">
                                <a
                                    href=""
                                    className="bg-[#28c484] py-2 px-4 text-white text-lg rounded-full"
                                >
                                    Read More ->
                                </a>
                            </div>
                        </div>
                    </div>
                    <div className="flex items-center gap-2 fixed bottom-4 right-4">
                        <div className="mr-14">
                            <div className="p-1 text-sm rounded bg-[#28c484] text-white font-medium h-auto">
                                <a href="">Got Questions?</a>
                            </div>
                        </div>
                        <div className="bg-[#28c484] rounded-full p-4 absolute top-[-2.5rem] right-0">
                            <a href="">
                                <i className="fa-solid fa-envelope fa-xl text-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <AdvanceFooter />
        </div>
    );
};

export default Dashboard;
