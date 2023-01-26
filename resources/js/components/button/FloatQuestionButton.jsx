const FloatQuestionButton = () => {
    return (
        <a
            target={"_blank"}
            href={
                "mailto:mail@support.helpline.id?subject=%3A%20Helpline.id%3A%20Ask%20for%20Help&body=Hi%2C%20I%20would%20like%20to%20get%20guidance%20on%20how%20to"
            }
            className="flex items-center gap-2 fixed bottom-4 right-4"
        >
            <div className="mr-14">
                <div className="p-1 text-sm rounded bg-[#28c484] text-white font-medium h-auto">
                    <a>Got Questions?</a>
                </div>
            </div>
            <div className="bg-[#28c484] rounded-full p-4 absolute top-[-2.5rem] right-0">
                <a>
                    <i className="fa-solid fa-envelope fa-xl text-white"></i>
                </a>
            </div>
        </a>
    );
};

export default FloatQuestionButton;
