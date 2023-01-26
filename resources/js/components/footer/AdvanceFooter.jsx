import { Link } from "react-router-dom";
import { useState } from "react";
import MainModal from "../modals/MainModal";
import Box from "@mui/material/Box";
import TextField from "@mui/material/TextField";
import { useDispatch } from "react-redux";
import { sendContactMessage } from "../../actions/user";

const AdvanceFooter = ({ bottomFooter = "bottom-10" }) => {
    const dispatch = useDispatch();
    const [openModal, setOpenModal] = useState(false);
    const [data, setData] = useState({
        name: "",
        email: "",
        body: "",
    });

    return (
        <>
            <MainModal
                onClick={() => {
                    dispatch(sendContactMessage(data));
                }}
                openModal={openModal}
                onClose={() => {
                    setOpenModal(false);
                }}
            >
                <Box>
                    <TextField
                        sx={{
                            label: { color: "#1565c0" },
                        }}
                        className={"bg-blue-50 border-0"}
                        margin="normal"
                        required
                        fullWidth
                        id="name"
                        label="Name"
                        name="name"
                        onChange={(e) => {
                            setData({ ...data, name: e.target.value });
                        }}
                        value={data.name}
                        autoComplete="name"
                        autoFocus
                    />
                    <TextField
                        sx={{
                            label: { color: "#1565c0" },
                        }}
                        className={"bg-blue-50 border-0"}
                        margin="normal"
                        required
                        fullWidth
                        id="email"
                        label="Email"
                        name="email"
                        onChange={(e) => {
                            setData({ ...data, email: e.target.value });
                        }}
                        value={data.email}
                        autoComplete="email"
                    />
                    <TextField
                        sx={{
                            label: { color: "#1565c0" },
                        }}
                        className={"bg-blue-50 border-0"}
                        margin="normal"
                        multiline
                        rows={2}
                        maxRows={4}
                        required
                        fullWidth
                        id="body"
                        label="Body"
                        name="body"
                        onChange={(e) => {
                            setData({ ...data, body: e.target.value });
                        }}
                        value={data.body}
                        autoComplete="body"
                    />
                </Box>
            </MainModal>
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
                                <Link
                                    to={"/counsellors"}
                                    className="text-center px-4 py-2  rounded-full  border border-2 border-white lg:text-2xl lg:font-normal text-white w-1/3"
                                >
                                    Chat With Us
                                </Link>
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
                                <a
                                    className={"cursor-pointer"}
                                    onClick={() => {
                                        setOpenModal(true);
                                    }}
                                >
                                    Contact
                                </a>
                            </div>
                            <div>
                                <a
                                    target={"_blank"}
                                    href="https://bullyid.org/terms-and-conditions/"
                                >
                                    Terms of Use
                                </a>
                            </div>
                            <div>
                                <a
                                    target={"_blank"}
                                    href="https://bullyid.org/privacy-policy/"
                                >
                                    Privacy
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className={"flex"}>
                    <div className={"my-auto"}>
                        <span className={"text-blue-500 p-4"}>
                            Managed by Bullyid Indonesia. Supported and
                            supervised by:{" "}
                        </span>
                    </div>
                    <div>
                        <img
                            className={"w-20"}
                            src={process.env.MIX_APP_URL + "/assets/iom.png"}
                            alt="IOM Logo"
                        />
                    </div>
                </div>
            </footer>
        </>
    );
};
export default AdvanceFooter;
