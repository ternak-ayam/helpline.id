const AdvanceFooter = ({ bottomFooter = "bottom-10" }) => {
    return (
        <>
            <footer className="mt-16">
                <div className="grid lg:grid-cols-4  grid-cols-1">
                    <div className="col-span-1 flex justify-center">
                        <img
                            src={
                                process.env.MIX_APP_URL +
                                "/assets/logo_helpline.png"
                            }
                            alt=""
                            className="p-8"
                        />
                    </div>
                    <div className="col-span-3 flex items-center">
                        <div className="bg-[#28c484] lg:rounded-l-full p-6 w-full flex justify-between items-center">
                            <div className="text-white lg:text-5xl">
                                We are here for you
                            </div>
                            <div>
                                <a
                                    href=""
                                    className="text-center px-4 py-2  rounded-full  border border-2 border-white lg:text-2xl lg:font-normal text-white w-1/3"
                                >
                                    Chat With Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="grid lg:grid-cols-2 grid-cols-1 lg:ml-">
                    <div className="col-span-1 lg:p-4 p-2">
                        <div className="lg:w-1/2 bg-[#2769c5] text-lg text-white p-2 rounded-full text-center">
                            About Helpline.id
                        </div>
                        <div className="p-8 rounded-3xl border border-1 border-[#2769c5] mt-[-1.5rem]">
                            <ul className="list-disc text-xl font-normal text-[#2769c5]">
                                <li>
                                    Short-term support for people who are
                                    feeling overwhelmed or having difficulty
                                    coping or staying safe
                                </li>
                                <li>
                                    Confidential one-to-one support with a
                                    trained Helpline counsellor
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="col-span-1 lg:p-4 p-2">
                        <div className="lg:w-1/2 bg-[#2769c5] text-lg text-white p-2 rounded-full text-center">
                            What we do during the call
                        </div>
                        <div className="p-8 rounded-3xl border border-1 border-[#2769c5] mt-[-1.5rem]">
                            <ul className="list-disc text-xl font-normal text-[#2769c5]">
                                <li>Listen without judgment</li>
                                <li>
                                    Provide a safe space to discuss your needs,
                                    worries or concerns
                                </li>
                                <li>
                                    Work with you to explore options for support
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div className="bg-[#2769c5] flex  items-center  p-4">
                    <div className="container m-auto flex lg:justify-between flex-wrap justify-center">
                        <div className="text-white text-2xl font-semibold lg:text-start text-center">
                            A safe place to talk day or night
                        </div>
                        <div className="text-white text-lg font-thin flex gap-4">
                            <div>
                                <a href="">Policies</a>
                            </div>
                            <div>
                                <a href="">Terms of Use</a>
                            </div>
                            <div>
                                <a href="">Privacy</a>
                            </div>
                        </div>
                    </div>
                </div>
                <p className={"text-blue-500 p-4"}>
                    Managed by Bullyid Indonesia
                </p>
            </footer>
        </>
    );
};
export default AdvanceFooter;
