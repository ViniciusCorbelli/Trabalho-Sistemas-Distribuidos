package com.ufjf;

import javax.jws.WebService;

@WebService(endpointInterface = "com.ufjf.TemperatureConverter")
public class TemperatureConverterImpl implements TemperatureConverter {
    @Override
    public double celsiusToKelvin(double celsius) {
        return celsius + 273.15;
    }
}
