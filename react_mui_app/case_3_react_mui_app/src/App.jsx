import { Container, ThemeProvider } from '@mui/material';
import { Route, BrowserRouter as Router, Routes } from 'react-router-dom';
import { Header } from './components/header/Header';
import { LoginPage } from './pages/LoginPage';
import { TablePage } from './pages/TablePage';
import { theme } from './theme';

function App() {
  return (
    <>
    <ThemeProvider theme={theme}>
      <Router>
        <Header/>
        <Container sx={{marginTop: '80px'}} maxWidth="xl">
          <Routes>
          <Route path='/' element={<LoginPage/>} />
            <Route path='/table' element={<TablePage/>} />
          </Routes>
        </Container>
      </Router>
    </ThemeProvider>
    </>
  );
}

export default App;
