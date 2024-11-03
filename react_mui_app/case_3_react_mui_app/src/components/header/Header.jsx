import LoginIcon from '@mui/icons-material/Login';
import { AppBar, Avatar, Box, Button, Container, IconButton, LinearProgress, Toolbar, Typography } from "@mui/material";
import { Link } from "react-router-dom";

export const Header = () => {
  return (
    <>
      <AppBar position="fixed" sx={{ background: "#ffffff" }}>
        <LinearProgress sx={{
          position: "fixed",
          width: "100%",
        }} />
        <Toolbar>
          <Container sx={{
            display: "flex",
            justifyContent: "space-between",
            alignItems: "center"
          }}>
            <Link to="/">
              <IconButton edge="start" color="primary">
                Table App
              </IconButton>
            </Link>
            <Box display="flex" alignItems="center">
              <Button
                variant="outlined"
                component="a"
                href="/"
                endIcon={<LoginIcon />}
              >
                <Box display="flex">
                  <Avatar sx={{ width: 24, height: 24, marginRight: 1 }}/>
                  <Typography component="span">Sokolov Andrew</Typography>
                </Box>
              </Button>
            </Box>
          </Container>
        </Toolbar>
      </AppBar>
    </>
  )
}
