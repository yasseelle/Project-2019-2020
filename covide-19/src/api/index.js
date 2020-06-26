import axios from "axios";
const url = "https://covid19.mathdro.id/api";
export const fetchData = async (country) => {
  let changebaleUrl = url;
  if (country) {
    changebaleUrl = `${url}/countries/${country}`;
  }
  try {
    const {
      data: { confirmed, recovered, deaths, lastUpdate },
    } = await axios.get(changebaleUrl);

    return {
      confirmed,
      recovered,
      deaths,
      lastUpdate,
    };
  } catch (error) {
    console.log(error);
  }
};

export const fetchDailyData = async () => {
  try {
    const { data } = await axios.get(`${url}/daily`);
    const modifyedData = data.map((DailyData) => ({
      confirmed: DailyData.confirmed.total,
      deaths: DailyData.deaths.total,
      date: DailyData.reportDate,
    }));
    return modifyedData;
  } catch (error) {
    console.log(error);
  }
};

export const fetchCountries = async () => {
  try {
    const {
      data: { countries },
    } = await axios.get(`${url}/countries`);
    return countries.map((country) => country.name);
  } catch (error) {
    console.log(error);
  }
};
