const FloatQuestionButton = () => {
    return (
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
    );
};

export default FloatQuestionButton;
