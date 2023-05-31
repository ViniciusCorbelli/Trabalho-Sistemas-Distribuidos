package com.ufjf;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;

@WebService
public interface TemperatureConverter {
    @WebMethod
    double celsiusToKelvin(@WebParam(name = "celsius") double celsius);
}
