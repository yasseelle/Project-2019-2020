import React, { useState, useEffect } from "react";
import { NativeSelect, FormControl, StylesProvider } from "@material-ui/core";
import styles from "./CountryPicker.module.css";
import { fetchCountries } from "../../api";
const CountryPicker = ({ hundelCountryChange }) => {
  const [fetchedCountries, setFetchedCountries] = useState([]);
  useEffect(() => {
    const fetchAPI = async () => {
      setFetchedCountries(await fetchCountries());
    };
    fetchAPI();
  }, [setFetchedCountries]);
  console.log(fetchedCountries);

  return (
    <FormControl className={styles.formcontrol}>
      <NativeSelect
        defaultValue=""
        onChange={(e) => hundelCountryChange(e.target.value)}
      >
        <option className={styles.frm} value="">Global</option>
        {fetchedCountries.map((country, i) => (
          <option className={styles.frm} key={i} value={country}>
            {country}
          </option>
        ))}
      </NativeSelect>
    </FormControl>
  );
};

export default CountryPicker;
