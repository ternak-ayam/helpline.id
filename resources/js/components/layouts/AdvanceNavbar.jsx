import { Link } from "react-router-dom";

const AdvanceNavbar = () => {
    return (
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
                    <a
                        href={"/"}
                        className="col-span-1 flex justify-center lg:justify-start"
                    >
                        <img
                            src={
                                process.env.MIX_APP_URL +
                                "/assets/logo_helpline.png"
                            }
                            alt="Logo"
                        />
                    </a>
                    <div className="lg:col-span-2 col-span-1 flex gap-2 items-center justify-center lg:mt-none ">
                        <a className={"-mt-12 mr-2"}>
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
                            <a className="text-white text-lg">Online</a>
                        </div>
                        <div className="bg-[#2769c5] p-1 rounded-sm w-2/3 flex gap-2 items-center justify-center">
                            <a className="text-white text-lg">Available 24/7</a>
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
                            <a className="border-b-2 border-[#28c484] text-lg text-[#2769c5]">
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
                            <a className="border-b-2 border-[#28c484] text-lg text-[#2769c5]">
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
    );
};
export default AdvanceNavbar;