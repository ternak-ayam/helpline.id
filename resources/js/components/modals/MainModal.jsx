import LoadingButton from "@mui/lab/LoadingButton";
import { useState } from "react";
import Button from "@mui/material/Button";

const MainModal = ({ openModal = false, onClose, children, onClick }) => {
    const [loading, setLoading] = useState(false);

    return (
        <div
            className={`relative z-10 ${openModal ? "" : "hidden"}`}
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div className="fixed inset-0 z-10 overflow-y-auto">
                <div className="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div className="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div className="mt-3 text-center sm:mt-0 sm:text-left">
                                <h3
                                    className="text-lg font-medium leading-6 text-gray-900"
                                    id="modal-title"
                                >
                                    Send Message
                                </h3>
                                <div className="mt-2">{children}</div>
                            </div>
                        </div>
                        <div className="bg-gray-50 px-4 py-3 grid grid-cols-4 gap-2">
                            <div className={"col-span-1 my-auto"}>
                                <LoadingButton
                                    loading={loading}
                                    onClick={onClose}
                                    fullWidth
                                    sx={{ mt: 3, mb: 2 }}
                                >
                                    Cancel
                                </LoadingButton>
                            </div>
                            <div className={"col-span-3"}>
                                <LoadingButton
                                    loading={loading}
                                    onClick={onClick}
                                    fullWidth
                                    variant="contained"
                                    sx={{ mt: 3, mb: 2 }}
                                >
                                    Send Message
                                </LoadingButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default MainModal;
