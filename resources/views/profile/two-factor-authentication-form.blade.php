<x-jet-action-section>
    <x-slot name="title">
        {{ __('การรับรองความถูกต้องด้วยสองปัจจัย') }}
    </x-slot>

    <x-slot name="description">
        {{ __('เพิ่มความปลอดภัยเพิ่มเติมให้กับบัญชีของคุณโดยใช้การตรวจสอบสิทธิ์สองปัจจัย') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('เปิดใช้งานการตรวจสอบสิทธิ์แบบสองปัจจัยให้เสร็จสิ้น') }}
                @else
                    {{ __('คุณได้เปิดใช้งานการรับรองความถูกต้องด้วยสองปัจจัย') }}
                @endif
            @else
                {{ __('คุณไม่ได้เปิดใช้งานการตรวจสอบสิทธิ์แบบสองปัจจัย') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('เมื่อเปิดใช้งานการรับรองความถูกต้องด้วยสองปัจจัย คุณจะได้รับพร้อมท์ให้ใส่โทเค็นแบบสุ่มที่ปลอดภัยระหว่างการตรวจสอบสิทธิ์ คุณสามารถดึงโทเค็นนี้จากแอปพลิเคชัน Google Authenticator ในโทรศัพท์ของคุณ') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('หากต้องการเปิดใช้งานการยืนยันตัวตนแบบสองขั้นตอนให้เสร็จสิ้น ให้สแกนรหัส QR ต่อไปนี้โดยใช้แอปพลิเคชันตรวจสอบความถูกต้องของโทรศัพท์ หรือป้อนรหัสการตั้งค่าและระบุรหัส OTP ที่สร้างขึ้น') }}
                        @else
                            {{ __('เปิดใช้งานการรับรองความถูกต้องด้วยสองปัจจัยแล้ว สแกนรหัส QR ต่อไปนี้โดยใช้แอปพลิเคชันตรวจสอบความถูกต้องของโทรศัพท์หรือป้อนรหัสการตั้งค่า') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('คีย์การตั้งค่า') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-jet-label for="code" value="{{ __('รหัส') }}" />

                        <x-jet-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model.defer="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-jet-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('เก็บรหัสกู้คืนเหล่านี้ไว้ในตัวจัดการรหัสผ่านที่ปลอดภัย สามารถใช้เพื่อกู้คืนการเข้าถึงบัญชีของคุณได้หากอุปกรณ์ตรวจสอบสิทธิ์แบบสองขั้นตอนสูญหาย') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('เปิดใช้งาน') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('สร้างรหัสกู้คืนใหม่') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @elseif ($showingConfirmation)
                    <x-jet-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-jet-button type="button" class="mr-3" wire:loading.attr="disabled">
                            {{ __('ยืนยัน') }}
                        </x-jet-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('แสดงรหัสการกู้คืน') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-jet-secondary-button wire:loading.attr="disabled">
                            {{ __('ยกเลิก') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-jet-danger-button wire:loading.attr="disabled">
                            {{ __('ปิดการใช้งาน') }}
                        </x-jet-danger-button>
                    </x-jet-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-jet-action-section>
