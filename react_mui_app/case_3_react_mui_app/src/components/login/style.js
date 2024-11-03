import { Box, Button, TextField, styled } from "@mui/material";

export const StyledTextField = styled(TextField)(({theme}) => ({
  "& .MuiOutlinedInput-root": {
    borderRadius: "12px",
    fontSize: "1.1rem"
  },
}))

export const LoginContainer = styled(Box)(({theme}) => ({
  margin: "50px auto",
  display: "flex",
  flexDirection: "column",
  alignItems: "center",
  maxWidth: "500px",
}))

export const LoginButton = styled(Button)(({theme}) => ({
  marginTop: "14px",
  padding: "12px 16px",
  borderRadius: "12px",
  fontSize: "1.1rem",
  fontWeight: "bold"
}))
