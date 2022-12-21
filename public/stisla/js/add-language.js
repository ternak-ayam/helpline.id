const languageButton = document.getElementById("button-add-language");
const languageButtonTemplate = document.getElementById(
    "button-template-language"
);
const language = document.getElementById("language");
const displayLanguages = document.getElementById("displayLanguages");

languageButton.addEventListener("click", () => {
    if (!language.value) return;

    currentLanguages.push({
        value: language.value,
    });

    displayLanguage();
});

if (languageButtonTemplate) {
    languageButtonTemplate.addEventListener("click", (e) => {
        currentLanguages.push({
            value: e.target.innerText,
        });

        displayLanguage();
    });
}

const deleteLanguage = (id) => {
    currentLanguages = currentLanguages.filter((item, key) => key !== id);

    displayLanguage();
};

const displayLanguage = () => {
    let languagesElement = ``;

    currentLanguages.forEach((item, key) => {
        languagesElement += `
                              <div class="col-6">
                                <div class="p-3 border rounded-lg d-flex justify-content-between">
                                    <input type="hidden" name="languages[]" value="${item.value}">
                                    <li>
                                        ${item.value}
                                    </li>
                                    <div onclick="deleteLanguage(${key})" class="cursor-pointer">
                                        <i class="fas fa-trash text-danger"></i>
                                    </div>
                                </div>
                            </div>`;
    });

    language.value = "";
    displayLanguages.innerHTML = languagesElement;
};

btnAddEducation.addEventListener("click", () => {
    educationContent += `
                    <div class="row mt-4">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Major</label>
                                            <input type="text" class="form-control" name="major[]" id="major"
                                                   value="{{ old('major') }}"
                                                   required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>School/Institution</label>
                                            <input type="text" class="form-control" name="institution[]" id="institution"
                                                   value="{{ old('institution') }}"
                                                   required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
           `;
});
