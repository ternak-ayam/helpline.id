import { useState } from "react";
import {
    Box,
    Table,
    TableBody,
    TableCell,
    TableContainer,
    TableHead,
    TableRow,
} from "@mui/material";
import Typography from "@mui/material/Typography";
import moment from "moment";
import ReactPaginate from "react-paginate";

const CounsellingHistory = ({ histories, itemsPerPage }) => {
    const [itemOffset, setItemOffset] = useState(0);
    const endOffset = itemOffset + itemsPerPage;
    const currentItems = histories.slice(itemOffset, endOffset);
    const pageCount = Math.ceil(histories.length / itemsPerPage);

    const handlePageClick = (event) => {
        const newOffset = (event.selected * itemsPerPage) % histories.length;

        setItemOffset(newOffset);
    };

    const Histories = ({ currentItems }) => {
        return (
            <Box>
                <Typography
                    component="h1"
                    sx={{ fontWeight: "bold", textAlign: "center" }}
                    variant="h5"
                    color={"primary"}
                >
                    Counselling History
                </Typography>
                <TableContainer sx={{ maxHeight: 440, marginTop: 2 }}>
                    <Table stickyHeader aria-label="sticky table">
                        <TableHead>
                            <TableRow>
                                <TableCell key={12} align={"left"}>
                                    No
                                </TableCell>
                                <TableCell key={13} align={"left"}>
                                    Psychologist
                                </TableCell>
                                <TableCell key={14} align={"left"}>
                                    Translator
                                </TableCell>
                                <TableCell key={15} align={"left"}>
                                    Counselling Time
                                </TableCell>
                            </TableRow>
                        </TableHead>
                        <TableBody>
                            {currentItems?.length > 0 ? (
                                currentItems.map((item, key) => (
                                    <TableRow
                                        hover
                                        role="checkbox"
                                        tabIndex={-1}
                                        key={16}
                                    >
                                        <TableCell key={1} align={"left"}>
                                            {key + 1}
                                        </TableCell>
                                        <TableCell key={2} align={"left"}>
                                            {item.counsellor}
                                        </TableCell>
                                        <TableCell key={3} align={"left"}>
                                            {item.translator ?? "-"}
                                        </TableCell>
                                        <TableCell key={4} align={"left"}>
                                            {moment(
                                                item.counselling_time
                                            ).format("llll")}{" "}
                                            WIB
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableRow>
                                    <TableCell
                                        colSpan={5}
                                        sx={{ borderBottom: "none" }}
                                    >
                                        <Typography
                                            component="p"
                                            sx={{ textAlign: "center" }}
                                            variant="p"
                                        >
                                            No Records
                                        </Typography>
                                    </TableCell>
                                </TableRow>
                            )}
                        </TableBody>
                    </Table>
                </TableContainer>
            </Box>
        );
    };
    return (
        <>
            <Histories currentItems={currentItems} />
            <ReactPaginate
                breakLabel="..."
                nextLabel={<i className={"fas fa-arrow-right text-black"}></i>}
                onPageChange={handlePageClick}
                pageRangeDisplayed={5}
                pageCount={pageCount}
                previousLabel={
                    <i className={"fas fa-arrow-left text-black"}></i>
                }
                pageClassName="p-2 rounded-2xl"
                pageLinkClassName="p-2 rounded-2xl"
                previousClassName="p-2 rounded-2xl"
                previousLinkClassName="p-2 rounded-2xl"
                nextClassName="p-2 rounded-2xl"
                nextLinkClassName="p-2 rounded-2xl"
                breakClassName="page-item"
                breakLinkClassName="page-link"
                containerClassName="justify-center mt-4 p-4 flex gap-2"
                activeClassName="bg-blue-500 text-white p-2 rounded-2xl"
                renderOnZeroPageCount={null}
            />
        </>
    );
};
export default CounsellingHistory;
