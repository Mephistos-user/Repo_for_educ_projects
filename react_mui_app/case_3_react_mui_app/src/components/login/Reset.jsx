import { Avatar, Typography } from "@mui/material"
import { LoginButton, LoginContainer, StyledTextField } from "./style"

export const Reset = () => {
  return (
    <>
      <LoginContainer>
        <Avatar sx={{ width: 64, height: 64, marginBottom: 1 }}/>
        <Typography component="h1" variant="h5">
          Сбросьте пароль, чтобы продолжить!
        </Typography>
      
        <StyledTextField
          variant="outlined"
          margin="normal"
          required
          fullWidth
          id="email"
          label="Логин"
          name="email"
          autoComplete="email"
          autoFocus
        />
        <LoginButton
          type="submit"
          fullWidth
          variant="contained"
          color="primary"
        >
          Сбросить
        </LoginButton>
      </LoginContainer>
    </>
  )
}
