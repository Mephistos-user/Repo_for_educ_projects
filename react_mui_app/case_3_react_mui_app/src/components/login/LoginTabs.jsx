import TabContext from '@mui/lab/TabContext';
import TabList from '@mui/lab/TabList';
import TabPanel from '@mui/lab/TabPanel';
import { Box } from '@mui/material';
import Tab from '@mui/material/Tab';
import { useState } from "react";
import { Login } from "./Login";
import { Register } from "./Register";
import { Reset } from "./Reset";

export const LoginTabs = () => {
  const [value, setValue] = useState('1');

  const handleChange = (event, newValue) => {
    setValue(newValue);
  };
  return (
    <>
      <TabContext value={value}>
        <Box sx={{ borderBottom: 1, borderColor: 'divider' }}>
          <TabList onChange={handleChange} aria-label="lab API tabs example" centered>
            <Tab label="Войти в профиль" value="1" />
            <Tab label="Зарегистрироваться" value="2" />
            <Tab label="Сбросить пароль" value="3" />
          </TabList>
        </Box>
        <TabPanel value="1"><Login/></TabPanel>
        <TabPanel value="2"><Register/></TabPanel>
        <TabPanel value="3"><Reset/></TabPanel>
      </TabContext>
    </>
  )
}
