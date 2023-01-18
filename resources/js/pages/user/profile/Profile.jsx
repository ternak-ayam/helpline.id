import Container from "@mui/material/Container";
import CssBaseline from "@mui/material/CssBaseline";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import {
    FormControl,
    FormControlLabel,
    FormLabel,
    Grid,
    InputLabel,
    MenuItem,
    Radio,
    RadioGroup,
    Select,
    Table,
    TableBody,
    TableCell,
    TableContainer,
    TableHead,
    TablePagination,
    TableRow,
} from "@mui/material";
import TextField from "@mui/material/TextField";
import countries from "../../../../../storage/app/local/countries.json";
import LoadingButton from "@mui/lab/LoadingButton";
import { useEffect } from "react";
import Navbar from "../../../components/layouts/Navbar";
import { useDispatch, useSelector } from "react-redux";
import { getUserProfile, updateUserProfile } from "../../../actions/user";
import moment from "moment";
import { GET_PROFILE } from "../../../actions/type";
import { logout } from "../../../actions/auth";
import App from "../../../components/layouts/App";
import CounsellingHistory from "../../../components/profile/CounsellingHistory";

const Profile = () => {
    const dispatch = useDispatch();

    const { user } = useSelector((state) => state.profile);
    const { status } = useSelector((state) => state.message);

    useEffect(() => {
        dispatch(getUserProfile());
    }, []);

    const handleChangeInput = (e) => {
        dispatch({
            type: GET_PROFILE,
            payload: {
                ...user,
                [e.target.name]: e.target.value,
            },
        });
    };

    const handleLogout = () => {
        dispatch(logout());
    };

    return (
        <App>
            <Navbar />
            <Container component="main" maxWidth="md" sx={{ marginBottom: 12 }}>
                <CssBaseline />
                <Box
                    sx={{
                        marginBottom: 4,
                        flexDirection: "column",
                        alignItems: "center",
                    }}
                >
                    <Typography
                        component="h1"
                        sx={{ fontWeight: "bold", textAlign: "center" }}
                        variant="h5"
                        color={"primary"}
                    >
                        Profile
                    </Typography>
                    <Box component="form" noValidate sx={{ mt: 1 }}>
                        <Grid container spacing={2}>
                            <Grid item md={6} xs={12}>
                                <InputLabel
                                    id="select-name"
                                    className={"text-[#1565c0] font-bold mt-2"}
                                >
                                    Name
                                </InputLabel>
                                <TextField
                                    sx={{
                                        label: { color: "#1565c0" },
                                    }}
                                    className={"bg-blue-50 border-0 mt-0"}
                                    required
                                    fullWidth
                                    type="text"
                                    onChange={(e) => handleChangeInput(e)}
                                    value={user.name}
                                    id="name"
                                    labelid="select-name"
                                    name="name"
                                    InputLabelProps={{ shrink: true }}
                                    autoFocus
                                />
                            </Grid>
                            <Grid item md={6} xs={12}>
                                <InputLabel
                                    id="select-email"
                                    className={"text-[#1565c0] font-bold mt-2"}
                                >
                                    Email Address
                                </InputLabel>
                                <TextField
                                    sx={{
                                        label: { color: "#1565c0" },
                                    }}
                                    className={"bg-blue-50 border-0 mt-0"}
                                    required
                                    fullWidth
                                    type="email"
                                    onChange={(e) => handleChangeInput(e)}
                                    value={user.email}
                                    id="email"
                                    labelid="select-email"
                                    name="email"
                                    InputLabelProps={{ shrink: true }}
                                />
                            </Grid>
                        </Grid>
                        <Grid container spacing={2}>
                            <Grid item md={6} xs={12}>
                                <InputLabel
                                    id="select-unhcr"
                                    className={"text-[#1565c0] font-bold mt-2"}
                                >
                                    UNHCR Number
                                </InputLabel>
                                <TextField
                                    sx={{
                                        label: { color: "#1565c0" },
                                    }}
                                    className={"bg-blue-50 border-0 mt-0"}
                                    required
                                    disabled
                                    fullWidth
                                    labelid="select-unhcr"
                                    value={user.unhcr_number}
                                    type="text"
                                    id="unhcr"
                                    name="unhcr"
                                    InputLabelProps={{ shrink: true }}
                                />
                            </Grid>
                            <Grid item md={6} xs={12}>
                                <InputLabel
                                    id="select-country"
                                    className={"text-[#1565c0] font-bold mt-2"}
                                >
                                    Country of Origin
                                </InputLabel>
                                <Select
                                    sx={{
                                        label: { color: "#1565c0" },
                                    }}
                                    className={"bg-blue-50 border-0"}
                                    required
                                    fullWidth
                                    onChange={(e) => handleChangeInput(e)}
                                    value={user.country}
                                    labelid="select-country"
                                    id="country"
                                    name="country"
                                >
                                    {countries.map((item, i) => (
                                        <MenuItem key={i} value={item.name}>
                                            {item.name}
                                        </MenuItem>
                                    ))}
                                </Select>
                            </Grid>
                        </Grid>

                        <InputLabel
                            id="select-birthdate"
                            className={"text-[#1565c0] font-bold mt-3"}
                        >
                            Birthdate
                        </InputLabel>
                        <TextField
                            sx={{
                                label: { color: "#1565c0" },
                            }}
                            className={"bg-blue-50 border-0 mt-0"}
                            labelid="select-birthdate"
                            required
                            fullWidth
                            onChange={(e) => handleChangeInput(e)}
                            value={moment(user.birthdate).format("YYYY-MM-DD")}
                            type="date"
                            id="birthdate"
                            name="birthdate"
                            InputLabelProps={{ shrink: true }}
                        />
                        <div>
                            <FormControl>
                                <FormLabel
                                    className={"text-[#1565c0] mt-2 font-bold"}
                                    sx={{
                                        color: "#1565c0",
                                        fontWeight: "700",
                                    }}
                                    id="demo-row-radio-buttons-group-label"
                                >
                                    Sex
                                </FormLabel>
                                <RadioGroup
                                    row
                                    aria-labelledby="demo-row-radio-buttons-group-label"
                                    name="sex"
                                    onChange={(e) => handleChangeInput(e)}
                                    value={user.sex}
                                >
                                    <FormControlLabel
                                        className={"text-[#1565c0]"}
                                        value="female"
                                        control={<Radio />}
                                        label="Female"
                                    />
                                    <FormControlLabel
                                        className={"text-[#1565c0]"}
                                        value="male"
                                        control={<Radio />}
                                        label="Male"
                                    />
                                    <FormControlLabel
                                        className={"text-[#1565c0]"}
                                        value="others"
                                        control={<Radio />}
                                        label="Prefer not to say"
                                    />
                                </RadioGroup>
                            </FormControl>
                        </div>
                        <InputLabel
                            id="select-password"
                            className={"text-[#1565c0] font-bold mt-2"}
                        >
                            Password
                        </InputLabel>
                        <TextField
                            sx={{
                                label: { color: "#1565c0" },
                            }}
                            className={"bg-blue-50 mt-0"}
                            required
                            fullWidth
                            onChange={(e) => handleChangeInput(e)}
                            value={user.password}
                            name="password"
                            type="password"
                            labelid="select-password"
                            id="password"
                            InputLabelProps={{ shrink: true }}
                        />
                        <Grid container spacing={2}>
                            <Grid item md={10} xs={8}>
                                <LoadingButton
                                    type="button"
                                    fullWidth
                                    loading={status}
                                    onClick={() => {
                                        dispatch(updateUserProfile(user));
                                    }}
                                    variant="contained"
                                    sx={{ mt: 3, mb: 2 }}
                                >
                                    Update Profile
                                </LoadingButton>
                            </Grid>
                            <Grid item md={2} xs={4}>
                                <LoadingButton
                                    type="button"
                                    fullWidth
                                    onClick={() => {
                                        handleLogout();
                                    }}
                                    loading={status}
                                    color={"error"}
                                    variant="contained"
                                    sx={{ mt: 3, mb: 2 }}
                                >
                                    Logout
                                </LoadingButton>
                            </Grid>
                        </Grid>
                    </Box>
                </Box>
                <Box>
                    <CounsellingHistory
                        itemsPerPage={5}
                        histories={user.counselling_histories}
                    />
                </Box>
            </Container>
        </App>
    );
};
export default Profile;
